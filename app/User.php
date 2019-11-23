<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'comments'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public $timestamps = false;


    public function comments(){
        return $this->hasOne('App\Comment');
    }

    public function appendUserComment($comments){
        $currentComment = $this->comments()->body;
        $newComment = $currentComment .= "\n".$comments;

        $this->comments()->body = $newComment;
        return $this->comments()->save();
    }
}
