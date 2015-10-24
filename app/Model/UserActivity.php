<?php
/**
 * Created by IntelliJ IDEA.
 * User: mac
 * Date: 10/24/15
 * Time: 15:05
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_activity';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'activity_id', 'status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}