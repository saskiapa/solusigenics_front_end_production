<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = 'id';
    public $incrementing = false;

    public static function checkLogin($emailorusername, $password)
    {
        $identifier = filter_var($emailorusername, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $user = User::where($identifier, $emailorusername)->select('id', 'password')->first();
        
        if ($user == null) {
            return "NF";
        }
        else {
            if (Hash::check($password, $user->password)) {
                return $user->id;
            }
            else {
                return "NF";
            }
        }
    }
}
