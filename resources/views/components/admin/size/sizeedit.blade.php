@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Edit Size'}}@endsection
    <div class="container my-3">
        <form action="{{route('sizes.update',['size'=>$sizedata->slug])}}" method="POST" class="p-4 border">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Edit Size</h1>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="colorname" class="form-label">Size Name</label>
                        <input type="text" name="size_name" class="form-control @error('size_name') is-invalid @enderror" id="colorname" placeholder="eg:XL,XXL,S" value="{{$sizedata->size_name}}"  style="text-transform:uppercase">
                        @error('size_name')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Category Status</label>
                    <select class="form-select  @error('sizeStatus') is-invalid @enderror" aria-label="Default select example" name="sizeStatus">
                        <option selected disabled>Select Status</option>
                        <option value="1"  {{ $sizedata->status == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ $sizedata->status == 0 ? "selected" : "" }}>Inactive</option>
                      </select>
                      @error('sizeStatus')
                      <span>{{$message.'*'}}</span>
                  @enderror
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-secondary w-100">Edit Size</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection