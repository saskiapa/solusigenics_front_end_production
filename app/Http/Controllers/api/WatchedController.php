<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use App\Models\Watched;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WatchedController extends Controller
{
    public static function store($actual_video_id, $source)
    {
        $video_id = 0;
        if (!Videos::checkVideoExistByActualId($actual_video_id)) {  // if video not in database
            // store video in database
            $video = new Videos;
            $video->id = count(Videos::get()) + 1;
            $video->actual_id = $actual_video_id;
            $video->source = $source;
            $video->save();
        }
        $video_id = Videos::getVideoIdByActualId($actual_video_id);

        if (!Watched::checkWatchedExist(session('id'), $video_id)) {  // if user not watched current video yet
            // store watch history
            $w = new Watched();
            $w->user_id = session('id');
            $w->video_id = $video_id;
            $w->save();
        }
        else {
            // update watch history
            Watched::where("user_id", session('id'))
                        ->where("video_id", $video_id)
                        ->update(["updated_at" => new Carbon()]);
        }
    }

    public function deleteWatched(Request $request)
    {
        $videoId = Videos::getVideoIdByActualId($request->actualId);
        DB::table('watched')->where("user_id", session('id'))->where("video_id", $videoId)->delete();
    }

    public function getHistory()
    {
        return DB::table('watched')
                    ->join('videos', 'watched.video_id', '=', 'videos.id')
                    ->select('videos.actual_id as id', 'videos.source')
                    ->where('user_id', session('id'))
                    ->get();
    }
}
