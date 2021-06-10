<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Storage;
//use App\Http\Controllers\TodoController;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  Here password gets encrypted automatically, no longer need to encrypt during insertion.
     *
     * 
     */
    /*public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }*/

    /**
     *  Here password gets encrypted automatically, no longer need to encrypt during insertion.
     *
     * 
     */
    public function getNameAttribute($name){
        return ucfirst($name);
    }

    /**
     *  Upload avatar images and remove old images / replace.
     *
     * 
     */
    public static function uploadAvatar($image){
        
        $filename = $image->getClientOriginalName();
        //(new self())->deleteOldImage();
        $image->storeAs('images', $filename, 'public');
        auth()->user()->update(['avatar' => $filename]);

            
    }


    public static function deleteOldImage($oldimg){

        if($oldimg){
            Storage::delete('public/images/'.$oldimg);
        }

    }

    public function todos(){
        
        return $this->hasMany(Todo::class);

    }

}
