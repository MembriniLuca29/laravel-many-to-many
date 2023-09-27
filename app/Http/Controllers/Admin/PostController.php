<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Post;
use App\Models\Type;
use App\Models\Technology;

// Requests
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $formData = $request->validated();

        $post = Post::create([
            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
            'content' => $formData['content'],
            'type_id' => $formData['type_id'],
            // 'cover_img' => $formData
        ]);

        if (isset($formData['technologies'])) {
            foreach ($formData['technologies'] as $technologyId) {
                                                //  post_id  |  technology_id
                                                // ----------+---------
                $post->technologies()->attach($technologyId);  // $post->id |  $technologyId
            }
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $formData = $request->validated();

        $post->update([
            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
            'content' => $formData['content'],
            'type_id' => $formData['type_id'],
        ]);

        if (isset($formData['technologies'])) {
            $post->technologies()->sync($formData['technologies']);
        }
        else {
            $post->technologies()->detach();
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');

    }
}
