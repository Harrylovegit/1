<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class ProductController extends Controller
{
    public function index(){
        $product = Product::orderBy('created_at','desc')->Paginate();
        return view('Backend.Product.index',compact('product'));
    }

    public function create(){
        $category =  Category::all();
        return view('Backend.Product.create',compact('category'));
    }

    public function insert(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:255',
            'price'=> 'required|max:255',
            'description' => 'required',
            // 'image' => 'mimes:png,jpg.jpeg',
        ],
        [
            'name.required' => 'กรุณากรอกข้อมูลสินค้า',
            'name.max' => 'กรอกข้อมูลได้สูงสุด 255 ตัวอักษร',
            'price.required'=> 'กรุณากรอกข้อมูลราคาสินค้า',
            'price.max'=> 'กรอกข้อมูลได้สูงสุด 255 ตัวอักษร',
            'description.required'=> 'กรุณากรอกรายระเอียดข้อมูลสินค้า',
            // 'image.mimes'=> 'อัพโหลดภาพที่มีนามสกุล .jpg . jpeg . png ได้เท่านั้น',

    ]);
    $pro = new Product();
    $pro->name = $request->name;
    $pro->price = $request->price;
    $pro->description = $request->description;
    $pro->category_id = $request->category_id;
    if($request->hasFile('image')){
        $filename = Str::random(10) . '.' .$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path().'/Backend/product/', $filename);
        Image::make(public_path().'/Backend/product/'.$filename)->resize(250,250)->save(public_path().'/Backend/product/resize/'.$filename);
        $pro->image = $filename;
    }else{
        $pro->image = "ไม่มีรูปภาพ";


    }
    $pro->save();
    alert()->success('บันทึกข้อมูลสำเร็จ','ชื่อประเภทสินค้านี้ถูกบันทึกลงในฐานข้อมูลเรีบยร้อยเเล้ว');
    return redirect('admin/Product/index');
}

public function edit($product_id){
    $pro = Product::find($product_id);
    $cat = Category::all();
    return view ('backend.product.edit',compact(pro));
}

public function update(Request $request, $product_id){
    $pro = Product::find($product_id);
    $pro->name = $request->name;
    $pro->price = $request->price;
    $pro->description = $request->description;
    $pro->category_id = $request->category_id;
    if($request->hasFile('image')){
        if($pro->image != 'no image.jpg'){
            File::delete(public_path().
            'Backend/product/'.$pro->image);
            File::delete(public_path().
            'Backend/product/resize'.$pro->image);
        }
        $filename = Str::random(10) . '.' .$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path().'/Backend/product/', $filename);
        Image::make(public_path().'/Backend/product/'.$filename)->resize(250,250)->save(public_path().'/Backend/product/resize/'.$filename);
        $pro->image = $filename;
    }else{
        $pro->image = "ไม่มีรูปภาพ";


    }
    $pro->update();
    alert()->success('บันทึกข้อมูลสำเร็จ','ข้อมูลนี้ถูกบันทึกเเล้ว');
    return redirect('admin/Product/index');
}

public function delete($product_id){

    $pro = Product::find($product_id);
    if($pro->image != 'no image.jpg'){
        File::delete(public_path().
        'Backend/product/'.$pro->image);
        File::delete(public_path().
        'Backend/product/resize'.$pro->image);
    }

    $pro->delete();
    alert()->success('ลบข้อมูลสำเร็จ','ข้อมูลนี้ถูกลบเเล้ว');
    return redirect('admin/Product/index');
}

}
