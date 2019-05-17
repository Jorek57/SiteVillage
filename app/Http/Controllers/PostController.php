<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use Image;
use Storage;
use Purifier;

class PostController extends Controller
{
    protected $postRepository;

    protected $nbrPerPage = 5;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getPaginate($this->nbrPerPage);
        $links = $posts->render();

        return view('posts.liste', compact('posts', 'links'));
    }

    public function show($id)
    {
        $post = $this->postRepository->getById($id);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function store(PostCreateRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id, 'contenu' => Purifier::clean($request['contenu'])]);

        if ($request->hasFile('image')){
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $location = public_path('uploads/' . $filename);
            Image::make($img)->save($location);

            $inputs['image'] = $filename;
        }

        $this->postRepository->store($inputs);

        return redirect(route('post.index'))->withOk("L'Article a bien été créé. ");
    }

    public function edit($id)
    {
        $post = $this->postRepository->getById($id);

        return view('posts.edit',  compact('post'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $oldFilename = $this->postRepository->getById($id)->image;

        $inputs = array_merge($request->all(), ['contenu' => Purifier::clean($request['contenu'])]);

        if ($request->hasFile('image')){
            $img = $request->file('image');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $location = public_path('uploads/' . $filename);

            Image::make($img)->save($location);

            $inputs['image'] = $filename;
            Storage::delete($oldFilename);
        }

        $this->postRepository->update($id, $inputs);

        return redirect(route('post.index'))->withOk("L'Article a été modifié.");
    }

    public function destroy($id)
    {
        $img = $this->postRepository->getById($id)->image;

        Storage::delete($img);

        $this->postRepository->destroy($id);

        return redirect()->back();
    }
}

