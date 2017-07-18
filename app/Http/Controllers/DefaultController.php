<?php

namespace App\Http\Controllers;

use App\Models\Post;

/**
 * Class DefaultController
 * @package App\Http\Controllers
 */
class DefaultController extends Controller
{

    /**
     * Display a list of posts.
     *
     * @return mixed
     */
    public function index()
    {
        $posts = Post::all();
        return $this->render('default/index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display a single post.
     *
     * @param null $post
     * @return mixed
     */
    public function show($post = null)
    {
        $post = Post::find($post);
        return $this->render('default/single', [
            'post' => $post,
        ]);
    }
}