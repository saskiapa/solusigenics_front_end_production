<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Favorited;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        if (!Videos::checkVideoExistByActualId($request->actualId)) {
            $video = new Videos;
            $video->id = count(Videos::get()) + 1;
            $video->actual_id = $request->actualId;
            $video->source = $request->source;
            $video->save();
        }
        $favorite = new Favorited;
        $favorite->user_id = session('id');
        $favorite->video_id = Videos::getVideoIdByActualId($request->actualId);
        $favorite->save();
    }

    public function isUserFavoritedVideo(Request $request)
    {
        if (!Videos::checkVideoExistByActualId($request->video_id)) {  // jika video tidak ada pada database
            return "0";
        }
        $videoId = Videos::getVideoIdByActualId($request->video_id);
        $favorited = Favorited::where("user_id", session(('id')))
                                ->where("video_id", $videoId)
                                ->get();
        return count($favorited) > 0 ? "1" : "0";
    }

    public function deleteFavorite(Request $request)
    {
        $videoId = Videos::getVideoIdByActualId($request->actualId);
        DB::table('favorited')->where("user_id", session('id'))->where("video_id", $videoId)->delete();
    }

    public function getFavorite(Request $request)
    {
        return DB::table('favorited')
                    ->join('videos', 'favorited.video_id', '=', 'videos.id')
                    ->select('videos.actual_id as id', 'videos.source')
                    ->where('favorited.user_id', session('id'))
                    ->get();
    }
}
