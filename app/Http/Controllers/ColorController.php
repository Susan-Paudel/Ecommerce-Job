<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductColor;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.admin.color.colorindex',['data'=>ProductColor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.admin.color.coloradd');
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
            'color_name'=>'required | string | max:255 | unique:product_colors',
            'color_picker'=>'required',
            'colorStatus'=>'required|in:0,1'
        ]);
     try{
        ProductColor::create([
        'color_name'=>$request->color_name,
        'color_picker'=>$request->color_picker,
        'slug'=>Str::random(30),
        'status'=>$request->colorStatus,
       ]);
    }catch(Exception $e)  
    {  
        if (!($e instanceof SQLException)) {
            app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
        }
        return redirect()->back()->with('unsuccessMessage', 'Failed to add color !!!');  
    } 
       return redirect()->route('colors.index')->with('successMessage','Color Added Successfully!!!');
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
    public function edit($color)
    {
        $findproduct=ProductColor::where('slug',$color)->first();
        return view('components.admin.color.coloredit',['colordata'=>$findproduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$color)
    {
        $request->validate([
            'color_name'=>'required | string | max:255',
            'color_picker'=>'required',
            'colorStatus'=>'required|in:0,1'
        ]);
        try{
            $color=ProductColor::where('slug',$color)->first();
            $color->color_name=$request->color_name;
            $color->color_picker=$request->color_picker;
            $color->status=$request->colorStatus;
            $color->save();
        }catch(Exception $e)  
        {  
            if (!($e instanceof SQLException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
            }
            return redirect()->back()->with('unsuccessMessage', 'Failed to update color !!!');  
        } 
           return redirect()->route('colors.index')->with('successMessage','Color Updated Successfully!!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($color)
    {
        $productslug=ProductColor::where('slug',$color)->first();
        $productslug->delete();
        return back()->with('successMessage',"Row deleted!");
    }
}
