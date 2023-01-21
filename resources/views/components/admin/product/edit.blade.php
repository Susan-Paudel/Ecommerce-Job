@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Edit Product'}}@endsection

    <div class="container my-3">
        <form method="POST" action="{{route('products.update',['product'=>$productdata->slug])}}" class="p-4 border" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="productname" class="form-label">Product Name</label>
                        <input type="text" name="productname" class="form-control" id="productname" placeholder="Product Name" value="{{$productdata->Product_Name}}">
                        @error('productname')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="productdescription" class="form-label">Product Description</label>
                        <textarea class="form-control"  name="productdescription" id="productdescription" rows="3">{{$productdata->Product_Description}}</textarea>
                        @error('productdescription')
                        <span>{{$message.'*'}}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="productcat" class="form-label">Product Category</label>
                        <select class="form-select" aria-label="Default select example" name="productcat">
                            <option disabled selected value="select">Select Category</option>
                            @foreach($categorydata as $cat)
                            <option value="{{$cat->id}}" {{ ($productdata->category_id == $cat->id) ? "selected":"" }}>{{$cat->category_name}}</option>
                            @endforeach
                          </select>
                          @error('productcat')
                          <span>{{$message.'*'}}</span>
                      @enderror
                    </div>
                </div>
               <div class="col-md-2">
                <label for="productimg" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected disabled>Select Status</option>
                    <option value="1"  {{ $productdata->status == '1' ? "selected" : "" }}>Active</option>
                    <option value="0" {{ $productdata->status == '0' ? "selected" : "" }}>Inactive</option>
                  </select>
               </div>
                <div class="col-md-6">
                   
                        <div class="mb-3">
                            <label for="productimg" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" name="productimg_single"/>
                                      <a href="{{asset('demo/'.$productdata->product_image)}}" target="_blank"><img src="{{asset('demo/'.$productdata->product_image)}}" alt="{{$productdata->product_image}}" style="height:100px;width:100px;margin:20px"></a>
                            @error('productimg')
                            <span>{{$message.'*'}}</span>
                            @enderror
                        </div>
                </div>
                <div class="col-12">
                    <label for="productimg" class="form-label">Product Attribute</label>
                    <div id="show_item" class="mb-2">
                        @php 
                          $setvalue=1;
                        @endphp
                        @foreach($product_entry as $p)
                        <div class="row" id="attr_<?=$setvalue?>">
                            <input type="hidden" name="attr_val[]" value="{{$p->id}}"/>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Mark Price</label>
                                <input type="text" class="form-control @error('markprice')@enderror" name="markprice[]" placeholder="enter mark price" value="{{$p->markprice}}" required/>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Fixed Price</label>
                                <input type="text" class="form-control @error('price')@enderror" name="price[]" placeholder="enter price" value="{{$p->price}}" required/>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Size</label>
                                <select class="form-select" aria-label="Default select example" name="size[]">
                                    <option selected disabled>Select Size</option>
                                    @foreach($size as $sizes)
                                    <option value="{{$sizes->id}}"{{$sizes->id==$p->product_size_id ? "selected":""}}>{{$sizes->size_name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Color</label>
                                <select class="form-select" aria-label="Default select example" name="color[]">
                                    <option selected disabled>Select Color</option>
                                    @foreach($color as $colors)
                                    <option value="{{$colors->id}}" {{$colors->id==$p->product_color_id ? "selected":""}}>{{$colors->color_name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="productimg" class="form-label">Image</label>
                                <input type="file" class="form-control" name="productimg_multi[]"/>
                                <a href="{{asset('images/demo/'.$p->product_img)}}" target="_blank"><img src="{{asset('demo/'.$p->product_img)}}" alt="{{$p->product_img}}" style="height:100px;width:100px;margin:20px"></a>
                            </div>
                            @if($setvalue==1)
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label"></label>
                                <button type="button" class="btn btn-primary add_item_btn w-100 mt-2"><i class="fa fa-plus me-2"></i>Add More</button>
                            </div>
                            @else
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label"></label>
                                <a href="{{route('remove_attr',['id'=>$p->id])}}" class="remove_item"><button class="btn btn-danger w-100 mt-2" type="button" ><i class="fa fa-minus me-2"></i>Remove</button></a>
                            </div>
                            @endif
                           
                        </div>
                        <?php $setvalue++; ?>
                        @endforeach
                    </div>
                   
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                    <label class="form-label"></label>
                    <button type="submit" class="btn btn-secondary w-100">Update Product</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(".add_item_btn").click(function(e){
           e.preventDefault();
            $("#show_item").append(` <div class="row" id="attr_<?=$setvalue?>">
                                <input type="hidden" name="attr_val[]"/>
                                <div class="col-md-2 mb-2">
                                    <label for="productimg" class="form-label">Mark Price</label>
                                    <input type="text" class="form-control @error('markprice')@enderror" name="markprice[]" placeholder="enter factory price" value="{{old('markprice')}}" required/>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label for="productimg" class="form-label">Fixed Price</label>
                                    <input type="text" class="form-control @error('price')@enderror" name="price[]" placeholder="enter price" value="{{old('price')}}" required/>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label for="productimg" class="form-label">Size</label>
                                    <select class="form-select" aria-label="Default select example" name="size[]">
                                        <option selected disabled>Select Size</option>
                                    @foreach($size as $sizes)
                                    <option value="{{$sizes->id}}">{{$sizes->size_name}}</option>
                                    @endforeach
                                      </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label for="productimg" class="form-label">Color</label>
                                    <select class="form-select" aria-label="Default select example" name="color[]">
                                        <option selected disabled>Select Color</option>
                                    @foreach($color as $colors)
                                    <option value="{{$colors->id}}">{{$colors->color_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="productimg" class="form-label">Image</label>
                                <label for="productimg" class="form-label">Image</label>
                                <input type="file" class="form-control" name="productimg_multi[]"/>
                            </div>
                               
                                <div class="col-md-2 mb-2">
                                    <label for="productimg" class="form-label"></label>
                                    <button class="btn btn-danger w-100 remove_item mt-2"><i class="fa fa-minus me-2"></i>Remove</button>
                                </div>
                            </div>`);
        });
       
       $(document).on('click','.remove_item',function(){
           let row_item=$(this).parent().parent();
           $(row_item).remove();
       });
        /*
       function remove_attr(count_attr,id){
        $.ajax({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:"/product_attr_remove",
            data:{"id="+id },
            type:"post",
            success:function(result){
                $('#attr_'+count_attr).remove();
            }
        });
          
       }
       */

       $(".addmoreimg").click(function(){
            $("#clone-img").prepend(` <div class="row" >
                                <div class="col-md-10 mb-2">
                                    <input type="file" class="form-control" name="productimg_multi[]"/>
                                </div>
                                <div class="col-md-2 tn-buttons mb-2">
                                    <button class="mb-xs mr-xs btn btn-danger removeimg w-100"><i class="fa fa-minus"></i></button>
                                </div>  
                            </div> `);
        });

        $(document).on('click','.removeimg',function(){
           let row_item=$(this).parent().parent();
           $(row_item).remove();
       });
    </script>
@endsection