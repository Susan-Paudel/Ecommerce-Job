<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components/admin/logo/logoindex',['data'=>Logo::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components/admin/logo/logoadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo_img'=>'required |image| mimes:jpeg,png,jpg,gif',
            'logoStatus'=>'required|in:0,1'
        ]);
     try{
        if($request->logo_img){
            $Image = time() .'.'. $request->logo_img->extension();
            $request->logo_img->move(public_path('demo'), $Image);
        }
        Logo::create([
        'img_logo_name'=>$Image,
        'slug'=>Str::random(30),
        'status'=>$request->logoStatus,
       ]);
    }catch(Exception $e)  
    {  
        if (!($e instanceof SQLException)) {
            app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
        }
        return redirect()->back()->with('unsuccessMessage', 'Failed to add logo !!!');  
    } 
       return redirect()->route('logos.index')->with('successMessage','Logo Added Successfully!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('components/admin/logo/logoedit',['data'=>Logo::where('slug',$slug)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogoRequest  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //return $request->all();
        $logo=Logo::where('slug',$slug)->first();
        if(isset($request->img_logo_name)){
            $image_path=public_path("demo/".$logo->img_logo_name);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
                $Imagename = time() .'.'. $request->img_logo_name->extension();
                $request->img_logo_name->move(public_path('demo'), $Imagename);
                $logo->img_logo_name=$Imagename;
        }
        $logo->status=$request->Status;
        $logo->save();
        return redirect()->route('logos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $delete=Logo::where('slug',$slug)->first();
        $image_path=public_path("demo/".$delete->img_logo_name);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $delete->delete();
        return back()->with('success','Logo Deleted!!');
    }
}
