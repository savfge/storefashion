<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutControlelr extends Controller
{
    public function index()
    {
        $abouts = About::paginate('4');
        return view('admin.about.index',compact('abouts'));
    }
    public function create(Request $request)
    {
        if($request->hasFile('image'))
        {
            foreach($request->image as $about)
            {
                $aboutName = $about->getClientOriginalName();
                $aboutExds = $about-> getClientOriginalExtension();
                $aboutNew = uniqid("",true).$aboutExds;
                $about->move('admin_panel/img/',$aboutNew);
                $about = new About();
                $about->name = $request->input('name');
                $about->desc1 = $request->input('desc1');
                $about->staus = $request->input('staus');
                $about->title1 = $request->input('title1');
                $about->title2 =$request->input('title2');
                $about->image = $aboutNew;
                $about->save();
            }
        }
        return response()->json(['sms' => 'About Is Created']);
    }
    public function edit($id)
    {
        $about = About::findOrfail($id);
        return view('admin.about.edit',compact('about'));
    }
    public function update(Request $request , $id)
    {
        $about = About::findOrfail($id);
        $about->name = $request->input('name');
        $about->desc1 = $request->input('desc1');
        $about->staus = $request->input('staus');
        $about->title1 = $request->input('title1');
        $about->title2 =$request->input('title2');
        if($request->hasFile('image'))
        {
            $destmtion  = 'admin_panel/img/'.$about->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fiilexdes = $file->getClientOriginalName();
            $fileName = time().'.'.$fiilexdes;
            $file->move('admin_panel/img/',$fileName);
            $about->image = $fileName;
        }
        $about->update();
        return response()->json(['sms' => 'About Is Updated']);
    }
    public function showdelete($id)
    {
        $about= About::findOrfail($id);
        return response()->json(['about' => $about]);
        
    }
    public function delete($id)
    {
        $about = About::findOrfail($id);
        $destmtiondelete = 'admin_panel/img/'.$about->image;
        if(File::exists($destmtiondelete))
        {
            File::delete($destmtiondelete);
        }
        $about->delete();
        return response()->json(['sms' => 'About Is Deleted']);
    }
}