<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogControlelr extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate('20');
        return view('admin.blog.index',compact('blogs'));
    }
    public function create(Request $request)
    {
        if($request->hasFile('image'))
        {
            foreach($request->image as $blog)
            {
                $blogName = $blog->getClientOriginalName();
                $blogEdswsw = $blog->getClientOriginalExtension();
                $bloNew = uniqid("",true).$blogEdswsw;
                $blog->move('admin_panel/img/',$bloNew);
                $blog = new Blog();
                $blog->name = $request->input('name');
                $blog->shorot_desc = $request->input('shorot_desc');
                $blog->long_desc = $request->input('long_desc');
                $blog->master_desc = $request->input('master_desc');
                $blog->image = $bloNew;
                $blog->save();
            }
        }
        return response()->json(['sms' => 'Blog Is Created']);
    }
    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        return view('admin.blog.edit',compact('blog'));
    }
    public function update(Request $request ,$id)
    {
        $blog =  Blog::findOrfail($id);
        $blog->name = $request->input('name');
        $blog->shorot_desc = $request->input('shorot_desc');
        $blog->long_desc = $request->input('long_desc');
        $blog->master_desc = $request->input('master_desc');
        if($request->hasFile('image'))
        {
            $destmtion = 'admin_panel/img/'.$blog->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileEcxer = $file->getClientOriginalName();
            $fileNAme = time().'.'.$fileEcxer;
            $file->move('admin_panel/img/',$fileNAme);
            $blog->image = $fileNAme;
        }
        $blog->update();
        return response()->json(['sms' => 'Blog Is Updated']);
    }
    public function showdeleteblog($id)
    {
        $blog = Blog::findOrfail($id);
        return response()->json(['blog' => $blog]);
    }
    public function delete($id)
    {
        $blog = Blog::findOrfail($id);
        $destmtiondelete = 'admin_panel/img/'.$blog->image;
        if(File::exists($destmtiondelete))
        {
            File::delete($destmtiondelete);
        }
        $blog->delete();
        return response()->json(['sms' => 'Blog Is Deleted']);
    }
}