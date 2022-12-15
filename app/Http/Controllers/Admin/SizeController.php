<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::paginate('4');
        return view('admin.size.index',compact('sizes'));
    }
    public function create(Request $request)
    {
        $size = new Size();
        $size->en_name = $request->input('en_name');
        $size->ar_name = $request->input('ar_name');
        $size->slug = Str::slug($request->en_name,'-');
        $size->save();
        return response()->json(['sms' => 'Add New Size Is Created']);
    }
    public function edit($id)
    {
        $size = Size::findOrfail($id);
        return response()->json(['size' => $size]);
    }
    public function update(Request $request , $id)
    {
        $size =  Size::findOrfail($id);
        $size->en_name = $request->input('en_name');
        $size->ar_name = $request->input('ar_name');
        $size->slug = Str::slug($request->en_name,'-');
        $size->save();
        return response()->json(['sms' => 'Update Size Is  Successed']);
    }
    public function delete($id)
    {
        $size = Size::findOrfail($id);
        $size->delete();
        return response()->json(['sms' => 'Delete Size Is Successed']);
    }
}
