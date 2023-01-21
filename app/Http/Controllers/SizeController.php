<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSize;
use Illuminate\Support\Str;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.admin.size.sizeindex',['data'=>ProductSize::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.admin.size.sizeadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'size_name'=>'required | string | max:3| unique:product_sizes',
            'sizeStatus'=>'required|in:0,1'
        ]);
     try{
        ProductSize::create([
        'size_name'=>$request->size_name,
        'slug'=>Str::random(30),
        'status'=>$request->sizeStatus,
       ]);
    }catch(Exception $e)  
    {  
        if (!($e instanceof SQLException)) {
            app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
        }
        return redirect()->back()->with('unsuccessMessage', 'Failed to add size !!!');  
    } 
       return redirect()->route('sizes.index')->with('successMessage','Size Added Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($size)
    {
        $findproduct=ProductSize::where('slug',$size)->first();
        return view('components.admin.size.sizeedit',['sizedata'=>$findproduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$size)
    {
        $request->validate([
            'size_name'=>'required | string | max:3',
            'sizeStatus'=>'required|in:0,1'
        ]);
        try{
            $size=ProductSize::where('slug',$size)->first();
            $size->size_name=$request->size_name;
            $size->status=$request->sizeStatus;
            $size->save();
        }catch(Exception $e)  
        {  
            if (!($e instanceof SQLException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
            }
            return redirect()->back()->with('unsuccessMessage', 'Failed to update Size !!!');  
        } 
           return redirect()->route('sizes.index')->with('successMessage','Size Updated Successfully!!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($size)
    {
        $productslug=ProductSize::where('slug',$size)->first();
        $productslug->delete();
        return back()->with('successMessage',"Row deleted!");
    }
}
