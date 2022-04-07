<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watched extends Model
{
    use HasFactory;

    protected $table = "watched";
    protected $primaryKey = 'id';
    public $incrementing = false;

    public static function checkWatchedExist($user_id, $video_id)
    {
        $w = Watched::where("user_id", $user_id)->where("video_id", $video_id)->get();
        return count($w) > 0;
    }
}
