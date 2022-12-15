<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodect;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ProdectController extends Controller
{
    public function index()
    {
        $prodects = Prodect::paginate('100');
        return view('admin.prodect.index',compact('prodects'));
    }
    public function create(Request $request)
    {
        $prdoect = new Prodect();
        $prdoect->category_id = $request->input('category_id');
        $prdoect->color_id = $request->input('color_id');
        $prdoect->size_id = $request->input('size_id');
        $prdoect->subcategory_id = $request->input('subcategory_id');
        $prdoect->barnd_id = $request->input('barnd_id');
        $prdoect->en_name = $request->input('en_name');
        $prdoect->ar_name = $request->input('ar_name');
        $prdoect->slug = Str::slug($request->en_name,'-');
        $prdoect->short_desc = $request->input('short_desc');
        $prdoect->long_desc = $request->input('long_desc');
        $prdoect->title1  = $request->input('title1');
        $prdoect->title2  = $request->input('title2');
        $prdoect->title3  = $request->input('title3');
        $prdoect->title4  = $request->input('title4');
        $prdoect->title5  = $request->input('title5');
        $prdoect->title6  = $request->input('title6');
        $prdoect->title7  = $request->input('title7');
        $prdoect->title8  = $request->input('title8');
        $prdoect->qty = $request->input('qty');
        $prdoect->new = $request->input('new');
        $prdoect->staus = $request->input('staus');
        $prdoect->stock = $request->input('stock');
        $prdoect->price = $request->input('price');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filexpnsrtimge1 = $file->getClientOriginalName();
            $fileNmaeimage1 = time().'.'.$filexpnsrtimge1;
            $file->move('admin_panel/img/',$fileNmaeimage1);
            $prdoect->image = $fileNmaeimage1;
        }

        if($request->hasFile('image2'))
        {
            $file2 = $request->file('image2');
            $filexpnsrtimge2 = $file2->getClientOriginalName();
            $fileNmaeimage2 = time().'.'.$filexpnsrtimge2;
            $file2->move('admin_panel/img/',$fileNmaeimage2);
            $prdoect->image2 = $fileNmaeimage2;
        }
        $prdoect->save();
        return response()->json(['sms' => 'Add New Prodect Is Successed']);
    }
    public function appendcatde($id)
    {
        $categorys = SubCategory::where('category_id',$id)->get();
        return view('admin.prodect.appendct',compact('categorys'));
    }
    public function edit($id)
    {
        $prodect = Prodect::findOrfail($id);
        return response()->json(['prodect'=> $prodect]);
    }
    public function update(Request $request ,$id)
    {
        $prdoect =  Prodect::findOrFail($id);
        $prdoect->category_id = $request->input('category_id');
        $prdoect->color_id = $request->input('color_id');
        $prdoect->size_id = $request->input('size_id');
        $prdoect->subcategory_id = $request->input('subcategory_id');
        $prdoect->barnd_id = $request->input('barnd_id');
        $prdoect->en_name = $request->input('en_name');
        $prdoect->ar_name = $request->input('ar_name');
        $prdoect->slug = Str::slug($request->en_name,'-');
        $prdoect->short_desc = $request->input('short_desc');
        $prdoect->long_desc = $request->input('long_desc');
        $prdoect->title1  = $request->input('title1');
        $prdoect->title2  = $request->input('title2');
        $prdoect->title3  = $request->input('title3');
        $prdoect->title4  = $request->input('title4');
        $prdoect->title5  = $request->input('title5');
        $prdoect->title6  = $request->input('title6');
        $prdoect->title7  = $request->input('title7');
        $prdoect->title8  = $request->input('title8');
        $prdoect->qty = $request->input('qty');
        $prdoect->new = $request->input('new');
        $prdoect->staus = $request->input('staus');
        $prdoect->stock = $request->input('stock');
        $prdoect->price = $request->input('price');
        if($request->hasFile('image'))
        {
            $destmion = 'admin_panel/img/'.$prdoect->image;
            if(File::exists($destmion))
            {
                File::delete($destmion);
            }
            $file = $request->file('image');
            $filexpnsrtimge1 = $file->getClientOriginalName();
            $fileNmaeimage1 = time().'.'.$filexpnsrtimge1;
            $file->move('admin_panel/img/',$fileNmaeimage1);
            $prdoect->image = $fileNmaeimage1;
        }

        if($request->hasFile('image2'))
        {
            $destmion = 'admin_panel/img/'.$prdoect->image2;
            if(File::exists($destmion))
            {
                File::delete($destmion);
            }
            $file2 = $request->file('image2');
            $filexpnsrtimge2 = $file2->getClientOriginalName();
            $fileNmaeimage2 = time().'.'.$filexpnsrtimge2;
            $file2->move('admin_panel/img/',$fileNmaeimage2);
            $prdoect->image2 = $fileNmaeimage2;
        }
        $prdoect->save();
        return response()->json(['sms' => 'Update Prodect Is Successed']);
    }
    public function delete($id)
    {
        $prdoect = Prodect::findOrfail($id);
        $destmtiondelete = 'admin_panel/img/'.$prdoect->image2;
        if(File::exists($destmtiondelete))
        {
            File::delete($destmtiondelete);
        }
        $prdoect->delete();
        return response()->json(['sms' => 'Deleted Prodect Is Successed']);
    }
    public function unsplshedsprodect($id)
    {
        $prodect = Prodect::findOrfail($id);
        $prodect->staus=2;
        $prodect->save();
        return response()->json(['sms' => 'Change Unblished Prodect Is Successed']);
    }
    public function publideseprodect($id)
    {
        $prodect = Prodect::findOrfail($id);
        $prodect->staus=1;
        $prodect->save();
        return response()->json(['sms' => 'Change Publisheds Prodect Is Successed']);
    }
}
