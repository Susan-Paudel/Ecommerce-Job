@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Add Product'}}@endsection

    <div class="container my-3">
        <form method="POST" action="{{route('products.store')}}" class="p-4 border" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Add Product</h1>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $errors->first('sku.*') }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="productname" class="form-label">Product Name</label>
                        <input type="text" name="productname" class="form-control" id="productname" placeholder="Product Name" value="{{old('productname')}}">
                        @error('productname')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="productdescription" class="form-label">Product Description</label>
                        <textarea class="form-control"  name="productdescription" id="productdescription" rows="3">{{old('productdescription')}}</textarea>
                        @error('productdescription')
                        <span>{{$message.'*'}}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="productcat" class="form-label">Product Category</label>
                        <select class="form-select" aria-label="Default select example" name="productcat">
                            <option selected value="select">Select Category</option>
                            @foreach($categorydata as $cat)
                            <option value="{{$cat->id}}" {{ (old("productcat") == $cat->id ? "selected":"") }}>{{$cat->category_name}}</option>
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
                    <option selected value="select">Select Status</option>
                    <option value="1"  {{ old('status') == "1" ? "selected" : "" }}>Active</option>
                    <option value="0" {{ old('status') == "0" ? "selected" : "" }}>Inactive</option>
                  </select>
                  @error('status')
                  <span>{{$message.'*'}}</span>
                  @enderror
               </div>
                <div class="col-md-6">
                        <div class="mb-3">
                            <label for="productimg" class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="productimg_single"/> 
                            @error('productimg_single')
                            <span>{{$message.'*'}}</span>
                            @enderror
                        </div>
                </div>
                
                <div class="col-12 mt-3">
                    <label for="productimg" class="form-label mb-3">Products Attributes</label>
                    <div id="show_item" class="mb-2">
                        <div class="row" id="1">
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Mark Price</label>
                                <input type="text" class="form-control @error('markprice')@enderror" name="markprice[]" placeholder="enter factory price" value="{{old('factoryprice')}}" required/>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Fixed Price</label>
                                <input type="text" class="form-control @error('price')@enderror" name="price[]" placeholder="enter price" value="{{old('price')}}" required/>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Size</label>
                                <select class="form-select" aria-label="Default select example" name="size[]" required>
                                    <option selected disabled>Select Size</option>
                                    @foreach($size as $sizes)
                                    <option value="{{$sizes->id}}">{{$sizes->size_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Color</label>
                                <select class="form-select" aria-label="Default select example" name="color[]" required>
                                    <option selected disabled>Select Color</option>
                                    @foreach($color as $colors)
                                    <option value="{{$colors->id}}">{{$colors->color_name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="productimg" class="form-label">Image</label>
                                <input type="file" class="form-control" name="productimg_multi[]" required/>
                                @error('productimg_multi.*')
                                <span>{{$message.'*'}}</span>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label"></label>
                                <button type="button" class="btn btn-primary add_item_btn w-100 mt-2"><i class="fa fa-plus me-2"></i> Add More</button>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                    <label class="form-label"></label>
                    <button type="submit" class="btn btn-secondary w-100">Add Product</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        
        $(".add_item_btn").click(function(e){
           e.preventDefault();
             
            $("#show_item").append(`   <div class="row" id="1">
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label">Mark Price</label>
                                <input type="text" class="form-control @error('factoryprice')@enderror" name="factoryprice[]" placeholder="enter factory price" value="{{old('factoryprice')}}" required/>
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
                                <input type="file" class="form-control" name="productimg_multi[]" required/>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="productimg" class="form-label"></label>
                                <button type="button" class="btn btn-danger remove_item w-100 mt-2"><i class="fa fa-minus me-2"></i> Remove</button>
                            </div>
                        </div>`);
        });
       $(document).on('click','.remove_item',function(e){
           e.preventDefault();
           let row_item=$(this).parent().parent();
           $(row_item).remove();
       });     
    </script>
@endsection