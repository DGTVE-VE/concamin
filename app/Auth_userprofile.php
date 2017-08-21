<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Auth_userprofile extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'edxapp.auth_userprofile';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'name', 'location', 'gender', 'mailing_address', 'year_of_birth', 'level_of_education', 'country', 'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
