<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.admin.category.categoryindex',['data'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.admin.category.categoryinsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required | string | max:255 | unique:categories',
            'categoryStatus'=>'required | in:0,1'
        ]);
        try{
            Category::create([	
                'category_name'=>$request->category_name,
                'status'=>$request->categoryStatus,
                'slug'=>Str::random(30),
           ]);
        }catch(Exception $e)  
        {  
            if (!($e instanceof SQLException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
            }
            return redirect()->back()->with('unsuccessMessage', 'Failed to add Category !!!');  
        } 
           return redirect()->route('categories.index')->with('successMessage','Category Added Successfully!!!');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $cat_data=Category::where('slug',$category)->first();
        return view('components.admin.category.categoryedit',['category'=>$cat_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'category_name'=>'required | string | max:255',
            'categoryStatus'=>'required | in:0,1',
        ]);
        try{
            $category=Category::where('slug',$category)->first();
            $category->category_name=$request->category_name;
            $category->status=$request->categoryStatus;
            $category->save();
        }catch(Exception $e)  
        {  
            if (!($e instanceof SQLException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
            }
            return redirect()->back()->with('unsuccessMessage', 'Failed to update Categories !!!');  
        } 
           return redirect()->route('categories.index')->with('successMessage','Category Updated Successfully!!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $categoryslug=Category::where('slug',$category)->first();
        $image_path=public_path("/images/category/".$categoryslug->image);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $categoryslug->delete();
        return back()->with('successMessage',"Row deleted!");
    }
}
