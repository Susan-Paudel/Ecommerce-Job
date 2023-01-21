@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Add Size'}}@endsection
    <div class="container my-3">
        <form action="{{route('sizes.store')}}" method="POST" class="p-4 border">
            @csrf
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Add Size</h1>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="colorname" class="form-label">Size Name</label>
                        <input type="text" name="size_name" class="form-control @error('size_name') is-invalid @enderror" id="colorname" placeholder="eg:XL,XXL,S" value="{{old('size_name')}}"  style="text-transform:uppercase">
                        @error('size_name')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Category Status</label>
                    <select class="form-select  @error('sizeStatus') is-invalid @enderror" aria-label="Default select example" name="sizeStatus">
                        <option selected disabled>Select Status</option>
                        <option value="1"  {{ old('sizeStatus') == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ old('sizeStatus') == 0 ? "selected" : "" }}>Inactive</option>
                      </select>
                      @error('sizeStatus')
                      <span>{{$message.'*'}}</span>
                  @enderror
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-secondary w-100">Add Size</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection