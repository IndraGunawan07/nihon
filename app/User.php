<?php

namespace App;

use App\Blameable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    // use Blameable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'secret_question', 'secret_answer', 'role'
        ,'remember_token', 'imageUrl'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUser($username)
    {
        $user = DB::table('users')->where('username', $username)->first();
        return $user;
    }

    // define relationship method 
    public function donations(){
        return $this->hasMany(Donations::class);
    }
    
}
