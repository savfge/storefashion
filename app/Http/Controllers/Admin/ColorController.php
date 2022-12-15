<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::paginate('3');
        return view('admin.color.index',compact('colors'));
    }
    public function create(Request $request)
    {
        $color = new Color();
        $color->en_name = $request->input('en_name');
        $color->ar_name = $request->input('ar_name');
        $color->slug = Str::slug($request->en_name,'-');
        $color->save();
        return response()->json(['sms' => 'Color IS Created']);
    }
    public function edit($id)
    {
        $color = Color::findOrfail($id);
        return response()->json(['color' => $color]);
    }
    public function update(Request $request , $id)
    {
        $color = Color::findOrfail($id);
        $color->en_name = $request->input('en_name');
        $color->ar_name = $request->input('ar_name');
        $color->slug = Str::slug($request->en_name,'-');
        $color->update();
        return response()->json(['sms' => 'Color IS Updated']);
    }
    public function delete($id)
    {
        $color = Color::findOrfail($id);
        $color->delete();
        return response()->json(['sms' => 'Color IS Deleted']);
    }
}
