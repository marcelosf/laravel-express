<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;

class PostsAdminController extends Controller
{
    
    private $post;
    
    
    public function __construct(Post $post) 
    {
        
        $this->post = $post;
        
    }
    
    
    public function index()
    {
        
        $posts = $this->post->paginate(5);
        
        return view('admin.posts.index', compact('posts'));
        
    }
    
    
    public function auth()
    {
        
        
        
    }
    
    
    public function create()
    {
        
        return view('admin.posts.create');
        
    }
    
    
    public function store(PostRequest $request)
    {
        
        $tagsIDs = $this->getTagsIds($request);
        
        $post = $this->post->create($request->all());
        
        $post->tags()->sync($tagsIDs);
        
        return redirect()->route('admin.posts.index');
        
    }
    
    
    public function edit($id)
    {
        
        $post = $this->post->find($id);
        
        return view('admin.posts.edit', compact('post'));
        
    }
    
    
    public function update($id, PostRequest $request)
    {
        
        $tagsIDs = $this->getTagsIds($request);
        
        $this->post->find($id)->update($request->all());
        
        $this->post->find($id)->tags()->sync($tagsIDs);
        
        return redirect()->route('admin.posts.index');
        
    }
    
    
    public function destroy($id)
    {
        
        $this->post->find($id)->delete();
        
        return redirect()->route('admin.posts.index');
        
    }
    
    
    private function getTagsIds(PostRequest $request)
    {
        
        $tagList = array_filter(array_map('trim', explode(',', $request->tags)));
        
        $tagsIDs = [];
        
        foreach ($tagList as $tagName)
        {
            
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
            
        }
        
        return $tagsIDs;
        
    }
    
}
