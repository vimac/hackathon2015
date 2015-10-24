<?php
/**
 * Created by IntelliJ IDEA.
 * User: mac
 * Date: 10/24/15
 * Time: 02:18
 */

namespace App\Http\Controllers;


use App\Model\Post;

class IndexController extends Controller
{

    public function getIndex() {
        $posts = Post::all();

        return view('welcome', ["posts" => $posts]);
    }


}