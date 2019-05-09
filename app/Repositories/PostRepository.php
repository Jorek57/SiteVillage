<?php

namespace App\Repositories;

use App\Post;

class PostRepository extends ResourceRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function getPaginate($n)
    {
        return $this->model->with('user')
            ->orderBy('posts.created_at', 'desc')
            ->paginate($n);
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
}
