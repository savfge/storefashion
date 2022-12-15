<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
    public function index()
    {
        $categorys = SubCategory::paginate('6');
        return view('admin.subcategory.index',compact('categorys'));
    }
    public function create(Request $request)
    {
        $category = new SubCategory();
        $category->en_name = $request->input('en_name');
        $category->ar_name = $request->input('ar_name');
        $category->slug = Str::slug($request->en_name,'-');
        $category->staus = $request->input('staus');
        $category->category_id = $request->input('category_id');
        $category->save();
        return response()->json(['sms' => 'Sub Category Is Created']);
    }
    public function edit($id)
    {
        $category = SubCategory::findOrfail($id);
        return response()->json(['category' => $category]);
    }
    public function update(Request $request , $id)
    {
        $category = SubCategory::findOrfail($id);
        $category->en_name = $request->input('en_name');
        $category->ar_name = $request->input('ar_name');
        $category->slug = Str::slug($request->en_name,'-');
        $category->staus = $request->input('staus');
        $category->category_id = $request->input('category_id');
        $category->update();
        return response()->json(['sms' => 'Sub Category Is Updated']);
    }
    public function delete($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();
        return response()->json(['sms' => 'Sub Category Is Deleted']);
    }
}
