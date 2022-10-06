<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','DESC')->orderBy('created_at','DESC')->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
          $post = new Post();
          $categories = Category::all();
          $tags = Tag::all();
          $prev_tags = [];

        return view('admin.posts.create',compact('post','categories','tags','prev_tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $post = new Post();

        $post->fill($data);

        $post->slug = Str::slug($post->title , '-');

        $post->user_id = Auth::id();

        $post->save();

        if(array_key_exists('tags',$data)){
            $post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $post)->with('message','il post è stato creato con successo')->with('type','success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    
    {   
        $tags = Tag::all();
         $categories = Category::all();
         $prev_tags = $post->tags->pluck('id')->toArray();
         
        return view('admin.posts.edit',compact('post','categories','tags','prev_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');

        $post->update($data);

        if(array_key_exists('tags',$data)){
            $post->tags()->sync($data['tags']);
        }
      else{
        $post->tags()->detach();
      }
        return redirect()->route('admin.posts.show', $post)->with('message','il post è stato modificato con successo')->with('type','success');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
if(count($post->tags->detach()))

        $post->delete();
        return redirect()->route('admin.posts.index')
        ->with('message','il messaggio è stato eliminato con successo')
        ->with('type','success');
    }
}
