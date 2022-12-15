<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Silder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class SilderConteollr extends Controller
{
    public function index()
    {
        $silders = Silder::paginate('4');
        return view('admin.silder.index',compact('silders'));
    } 
    public function create(Request $request)
    {
        if($request->hasFile('image'))
        {
            foreach($request->image as $silder)
            {
                $silderName = $silder->getClientOriginalName();
                $silderExpk = $silder->getClientOriginalExtension();
                $silderNew = uniqid("",true).$silderExpk;
                $silder->move('admin_panel/img/',$silderNew);
                $silder = new Silder();
                $silder->en_name = $request->input('en_name');
                $silder->ar_name = $request->input('ar_name');
                $silder->slug = Str::slug($request->en_name,'-');
                $silder->staus = $request->input('staus');
                $silder->en_title = $request->input('en_title');
                $silder->ar_title = $request->input('ar_title');
                $silder->image = $silderNew;
                $silder->save();
            }
        }
        return response()->json(['sms' => 'Add NEw Silder Is Created']);
    }
    public function edit($id)
    {
        $silder = Silder::findOrfail($id);
        return response()->json(['silder' => $silder]);
    }
    public function update(Request $request , $id)
    {
        $silder =  Silder::findOrFail($id);
        $silder->en_name = $request->input('en_name');
        $silder->ar_name = $request->input('ar_name');
        $silder->slug = Str::slug($request->en_name,'-');
        $silder->staus = $request->input('staus');
        $silder->en_title = $request->input('en_title');
        $silder->ar_title = $request->input('ar_title');
        if($request->hasFile('image'))
        {
            $destmtion = 'admin_panel/img/'.$silder->image;
            if(File::exists($destmtion))
            {
                File::delete($destmtion);
            }
            $file = $request->file('image');
            $fileExpnsw = $file->getClientOriginalName();
            $fileName = time().'.'.$fileExpnsw;
            $file->move('admin_panel/img/',$fileName);
            $silder->image = $fileName;
        }
        $silder->update();
        return response()->json(['sms' => 'Silder Updated Is  Successed']);
    }
    public function delete($id)
    {
        $silder = Silder::findOrfail($id);
        $destmtiondelete = 'admin_panel/img/'.$silder->image;
            if(File::exists($destmtiondelete))
            {
                File::delete($destmtiondelete);
            }
            $silder->delete();
        return response()->json(['sms' => 'Silder IS Deleted']);
    }
} 