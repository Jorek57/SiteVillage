<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    protected $postRepository;

    protected $nbrPerPage = 5;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getPaginate($this->nbrPerPage);
        $links = $posts->render();

        return view('posts.liste', compact('posts', 'links'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function store(PostCreateRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $this->postRepository->store($inputs);

        return redirect(route('post.index'))->withOk("L'Article a bien été créé.");
    }

    public function edit($id)
    {
        $post = $this->postRepository->getById($id);

        return view('posts.edit',  compact('post'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $this->postRepository->update($id, $request->all());

        return redirect(route('post.index'))->withOk("L'Article a été modifié.");
    }

    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->back();
    }

}
