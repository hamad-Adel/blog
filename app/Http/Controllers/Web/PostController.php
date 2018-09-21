<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth')->except(['index', 'show']);
    }
    
    private function postValidate(Request $request)
    {
        $request->validate([
            'title'=>'bail|required|min:5|max:255',
            'content'=>'required|min:10'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DES')->paginate(10);
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->postValidate($request);

        Post::create([
            'title'=>$request->title,
            'content'=> $request->content,
            'slug'=> str_slug($request->title).'-'.date('YmdHis'),
            'user_id'=> Auth::id()
        ]);
        return redirect('posts')->with('success', 'Your post saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if($post->user->id != Auth::id())
            return redirect('posts')->with('error', 'You do not have permissions');
        
        return view('posts.edit', ['post'=>$post]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->postValidate($request);
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->slug = str_slug($request->title).'-'.date('YmdHis');
        $post->save();
        return redirect('posts/'.$post->slug)->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('posts')->with('success', 'Post Deleted successfully');
    }
}
