<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $data=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.category_id')
        ->select('products.*','categories.category_name')
        ->get();
        return view('components.admin.product.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.admin.product.productinsert',['categorydata'=>Category::where('status','1')->get(),'color'=>ProductColor::where('status','1')->get(),'size'=>ProductSize::where('status',1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     try{
         $product=new Product;
         $product->Product_Name=$request->productname;
         $product->Product_Description=$request->productdescription;
         $product->slug=Str::random(30);
         $product->status=$request->status;
         $product->category_id=$request->productcat;
         if($request->productimg_single){
            $Image = time() .'.'. $request->productimg_single->extension();
            $request->productimg_single->move(public_path('demo/'), $Image);
            $product->product_image=$Image;
         }
         $product->save();
        foreach($request->price as $key=>$mp){
            $product_entry=new ProductAttribute;
            $product_entry->price=$mp;
            $product_entry->product_id=$product->id;
            $product_entry->product_size_id=$request->size[$key];
            $product_entry->product_color_id=$request->color[$key];
            $product_entry->markprice=$request->markprice[$key];
            $Imagename = rand(111111111,999999999) .'_.'. $request->productimg_multi[$key]->extension();
            $request->productimg_multi[$key]->move(public_path('demo/'), $Imagename);
            $product_entry->product_img=$Imagename;
            $product_entry->save();
        }
    }catch(Exception $e)  
    {  
        if (!($e instanceof SQLException)) {
            app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
        }
        return redirect()->back()->with('unsuccessMessage', 'Failed to add product !!!');  
    } 
       return redirect()->route('products.index')->with('successMessage','Product Added Successfully!!!');
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
    public function edit($product)
    {

        $findproduct=Product::where('slug',$product)->first();
        return view('components.admin.product.edit',
        ['productdata'=>$findproduct,
        'product_entry'=>ProductAttribute::where('product_id',$findproduct->id)->get(),
        'categorydata'=>Category::where('status','1')->get(),
        'color'=>ProductColor::where('status','1')->get(),
        'size'=>ProductSize::where('status','1')->get(),
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$product)
    {
        try{
            $product=Product::where('slug',$product)->first();
            $product->Product_Name=$request->productname;
            $product->Product_Description=$request->productdescription;
            $product->status=$request->status;
            $product->category_id=$request->productcat;
            if(isset($request->productimg_single)){
                $image_path=public_path("demo/".$product->product_image);
                if (file_exists($image_path)) {
                    @unlink($image_path);
                }
                    $Imagename = time() .'.'. $request->productimg_single->extension();
                    $request->productimg_single->move(public_path('demo/'), $Imagename);
                    $product->product_image=$Imagename;
            }
            $product->save();
           
             foreach($request->price as $key=>$mp){
                if($request->attr_val[$key]>0){
                        $product_entry_update=ProductAttribute::findOrFail($request->attr_val[$key]);
                        $product_entry_update->price=$mp;
                        $product_entry_update->product_id=$product->id;
                        $product_entry_update->product_size_id=$request->size[$key];
                        $product_entry_update->product_color_id=$request->color[$key];
                        $product_entry_update->markprice=$request->markprice[$key];
                        if(isset($request->productimg_multi[$key])){
                            $image_path=public_path("demo/".$request->productimg_multi[$key]);
                            if (file_exists($image_path)) {
                                @unlink($image_path);
                            }
                            $Imagename = rand(111111111,999999999) .'_.'. $request->productimg_multi[$key]->extension();
                            $request->productimg_multi[$key]->move(public_path('demo'), $Imagename);
                            $product_entry_update->product_img=$Imagename;
                        }
                        $product_entry_update->save();
                }else{
                    $product_entry=new ProductAttribute;
                    $product_entry->price=$mp;
                    $product_entry->product_id=$product->id;
                    $product_entry->product_size_id=$request->size[$key];
                    $product_entry->product_color_id=$request->color[$key];
                    $product_entry->markprice=$request->markprice[$key];
                    $Imagename = rand(111111111,999999999) .'_.'. $request->productimg_multi[$key]->extension();
                    $request->productimg_multi[$key]->move(public_path('demo'), $Imagename);
                    $product_entry->product_img=$Imagename;
                    $product_entry->save();
                }
               
                
            }

        }catch(Exception $e)  
        {  
            if (!($e instanceof SQLException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
            }
            return redirect()->back()->with('unsuccessMessage', 'Failed to update product !!!');  
        } 
           return redirect()->route('products.index')->with('successMessage','Product Updated Successfully!!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $productslug=Product::where('slug',$product)->first();
       if($productslug){
        $image_path=public_path("demo/".$productslug->product_image);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
       }
        
        $productslug->delete();
        $product_entry=ProductAttribute::where('product_id',$productslug->id)->get();
        if($product_entry){
            foreach($product_entry as $key=>$img){
                $image_path1=public_path("demo/".$img->product_img[$key]);
                   if (file_exists($image_path1)) {
                      @unlink($image_path1);
                   }
               $img->delete();
               }
        }
        
        return back()->with('successMessage',"Row deleted!");
    }
}
