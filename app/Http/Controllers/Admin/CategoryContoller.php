<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    public function index(){
        $category = Category::orderBy('category_id','desc')->Paginate('5');
        return view('Backend.category.index',compact('category'));
    }

    public function create(){
        return view('Backend.category.create');
    }

    public function insert(request $request){
        //ทำการป้องกันการกรอกข้อมูลผ่านฟร์อม
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ],
         [
                'name.required' => 'กรุณากรอกชื่อประเภทสินค้า',
                'name.unique' => 'ชื่อนี้มีอยู๋ในฐานข้อมูลแล้ว',
                'name.max' => 'กรอกข้อมูลไม่เกิน 255 ตัวอักษร',
        ]);

        //dd($request->name);
        //ทำการบันทึกข้อมูลลงในฐานข้อมูล
        $cat = new Category();
        $cat->name = $request->name;
        $cat->save();
        alert()->success('บันทึกข้อมูลสำเร็จ','ชื่อประเภทสินค้าชื่อนี้ถูกบันทึกลงในฐานข้อมูลเรียบร้อยเเล้ว.');
        return redirect()->route('c.index');

    }

    public function edit($category_id){
        $cat = Category::find($category_id);
        return view('backend.category.edit',compact('cat'));
    }

    public function update(Request $request, $category_id){
        $category = Category::find($category_id);
        $category->name = $request->name;
        $category->update();
        alert()->success('อัพเดทข้อมูลสำเร็จ','ชื่อประเภทสินค้านี้ถูกบันทึกลงในฐานข้อมูลเรีบยร้อยเเล้ว');
        return redirect()->route('c.index');

    }
public function delete($category_id){
    $category = Category::find($category_id);
    $category->delete();
    alert()->success('ลบข้อมูลข้อมูลสำเร็จ','ข้อมูลนี้นี้ถูกลบเรีบยร้อยเเล้ว');
        return redirect()->route('c.index');

   }



}
