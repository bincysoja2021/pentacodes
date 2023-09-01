<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class Blogcontroller extends Controller
{
    public function add()
    {
        return view('blog.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
                'title'   => 'required',
                'subtitle' => 'required',
                'image'  =>'required|mimes:jpeg,png,jpg,gif',
                'description'  => 'required',
                'status'    => 'required'
        ]);
        
        
        if($request->hasFile('image'))
        {
            $filename=$request->getSchemeAndHttpHost(). '/assets/image/' . time() . '.' .$request->image->extension();

            $request->image->move(public_path('/assets/image/'),$filename);
        }
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->user_id=Auth::user()->id;
        $blog->subtitle=$request->subtitle;
        $blog->image=$filename;
        $blog->description = $request->description;
        $blog->status=$request->status;
        $blog->save();

        return redirect()->route('home')->with('success','New post has been created successfully.');
    }
    public function read_more($id)
    {
        $blog=Blog::where('id',$id)->first();
        return view('blog.view',compact('blog'));
    }
    public function edit($id)
    {
        $blog=Blog::where('id',$id)->first();
        return view('blog.edit',compact('blog'));
    }

    public function update(Request $req)
    {
        $req->validate([
                'title'   => 'required',
                'subtitle' => 'required',
                'description'  => 'required',
                'status'    => 'required',
        ]);
        
        
        if($req->hasFile('image') != null)
        {
            $filename=$req->getSchemeAndHttpHost(). '/assets/image/' . time() . '.' .$req->image->extension();

            $req->image->move(public_path('/assets/image/'),$filename);
        }
        else
        {
          $data= Blog::where('id',$req->id)->first();
          $filename=$data->image;
        }
        
        $blog=Blog::where('id',$req->id)->update(['title'=>$req->title,'subtitle'=>$req->subtitle,'description'=>$req->description,'status'=>$req->status,'image'=>$filename,'user_id'=>Auth::user()->id]);

        return redirect()->route('home')->with('success','Post has been updated successfully');
 
    }

    public function blog_destroy($id)
    {
          Blog::find($id)->delete();
          return redirect()->route('home')->with('success','Post has been deleted successfully');
    }

}
