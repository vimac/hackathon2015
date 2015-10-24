<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActivityBroadcast extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activity_broadcast';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'message', 'image', 'to_user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
