<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    protected $table = "videos";
    protected $primaryKey = 'id';
    public $incrementing = false;

    public static function checkVideoExistByActualId($actualId)
    {
        $v = Videos::where("actual_id", $actualId)->get();
        return count($v) > 0;
    }

    public static function getVideoIdByActualId($actualId)
    {
        return Videos::where("actual_id", $actualId)->first()->id;
    }
}
