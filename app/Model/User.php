<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'telephone', 'avatar', 'token', 'nickname'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function activites()
    {
        $this->belongsToMany('activites', 'user_activity');
    }

    public function locations()
    {
        $this->hasMany('user_location');
    }
}
