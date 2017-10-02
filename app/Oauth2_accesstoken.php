<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Oauth2_accesstoken extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'edxapp.oauth2_accesstoken';

    public $timestamps = false;

    protected $fillable = [
      'id', 'token', 'expires', 'scope', 'client_id', 'user_id',
    ];

}
