<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Logo;

class HomeController extends Controller
{
    public function home(){
         $result['home_product']=
         DB::table('products')
         ->where(['status'=>'1'])
         ->get();

         if(isset($result['home_product'])){
         foreach($result['home_product'] as $list1){
             $result['product_entries_data'][$list1->id]=
                 DB::table('product_attributes')
                 ->leftJoin('product_sizes','product_sizes.id','=','product_attributes.product_size_id')
                 ->leftJoin('product_colors','product_colors.id','=','product_attributes.product_color_id')
                 ->where(['product_attributes.product_id'=>$list1->id])
                 ->get();
           }
        }
        $result['home_categories']=
        DB::table('products')
        ->leftjoin('categories','categories.id','=','products.category_id')
        ->where('categories.category_name','=','mobile')
        ->where(['products.status'=>'1'])
        ->where(['categories.status'=>'1'])
        ->select('products.*','categories.category_name')
        ->get();

        if(isset($result['home_categories'])){
            foreach($result['home_categories'] as $list){
                $result['product_entries_data_cat'][$list->id]=
                    DB::table('product_attributes')
                    ->leftJoin('product_sizes','product_sizes.id','=','product_attributes.product_size_id')
                    ->leftJoin('product_colors','product_colors.id','=','product_attributes.product_color_id')
                    ->where(['product_attributes.product_id'=>$list->id])
                    ->get();
              }
           }
        $result['logo']=Logo::where('status','1')->first();
        return view('components.index',$result);
    }

    public function productDetails($slug){
        $result['home_product']=
        DB::table('products')
        ->where(['status'=>'1'])
        ->where(['slug'=>$slug])
        ->get();

        if(isset($result['home_product'])){
        foreach($result['home_product'] as $list1){
            $result['product_entries_data'][$list1->id]=
                DB::table('product_attributes')
                ->leftJoin('product_sizes','product_sizes.id','=','product_attributes.product_size_id')
                ->leftJoin('product_colors','product_colors.id','=','product_attributes.product_color_id')
                ->where(['product_attributes.product_id'=>$list1->id])
                ->get();
          }
       }
       return response()->json(['result'=>$result]);
    }
}
