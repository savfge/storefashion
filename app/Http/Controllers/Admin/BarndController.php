<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class BarndController extends Controller
{
    public function index()
    {
        $barnds = Barnd::paginate('10');
        return view('admin.barnd.index',compact('barnds'));
    }
    public function create()
    {
        return view('admin.barnd.create');
    }
    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            foreach($request->image as $barnd)
            {
                $barndName = $barnd->getClientOriginalName();
                $barndEcsec = $barnd->getClientOriginalExtension();
                $fileNew = uniqid("",true).$barndEcsec;
                $barnd->move('admin_panel/img/',$fileNew);
                $barnd = new Barnd();
                $barnd->en_name = $request->input('en_name');
                $barnd->ar_name = $request->input('ar_name');
                $barnd->slug = Str::slug($request->en_name,'-');
                $barnd->image = $fileNew;
                $barnd->staus = $request->input('staus'); 
                $barnd->save();
            }
        }
        return response()->json(['sms' => 'Barnd Is Created']);

    }
    public function edit($id)
    {
        $barnd = Barnd::findOrfail($id);
        return view('admin.barnd.edit',compact('barnd'));
    }
    public function update(Request $request , $id)
    {
        $barnd =  Barnd::findOrfail($id);
        $barnd->en_name = $request->input('en_name');
        $barnd->ar_name = $request->input('ar_name');
        $barnd->slug = Str::slug($request->en_name,'-');
        if($request->hasFile('image'))
        {
            $destmtion = 'admin_panel/img/'.$barnd->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileExdes = $file->getClientOriginalName();
            $fileName = time().'.'.$fileExdes;
            $file->move('admin_panel/img/',$fileName);
            $barnd->image = $fileName;
        }
        $barnd->staus = $request->input('staus'); 
        $barnd->update();
        return response()->json(['sms' => 'Barnd Is Updated']);
    }
    public function delete($id)
    {
        $barnd = Barnd::findOrfail($id);
        $destmtilde = 'admin_panel/img/'.$barnd->image;
        if(File::exists($destmtilde))
        {
            File::delete($destmtilde);
        }
        $barnd->delete();
        return response()->json(['sms' => 'Barnd Is Deleted']);
    }
    public function unblisheds($id)
    {
        $barnd = Barnd::findOrfail($id);
        $barnd->staus = 2;
        $barnd->save();
        return response()->json(['sms' => 'Barnd Is Publisde Is Change']);
    }
    public function published($id)
    {
        $barnd = Barnd::findOrfail($id);
        $barnd->staus = 1;
        $barnd->save();
        return response()->json(['sms' => 'Barnd Is Unplsheds Is Change']);
    }
}