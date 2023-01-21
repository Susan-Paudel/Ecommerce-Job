@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Add Category'}}@endsection
    <div class="container my-3">
        <form action="{{route('categories.store')}}" method="POST" class="p-4 border" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Add Categories</h1>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="categoryname" class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="categoryname" placeholder="category name" value="{{old('category_name')}}">
                        @error('category_name')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Category Status</label>
                    <select class="form-select  @error('categoryStatus') is-invalid @enderror" aria-label="Default select example" name="categoryStatus">
                        <option selected disabled>Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                      @error('categoryStatus')
                      <span>{{$message.'*'}}</span>
                  @enderror
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-secondary w-100">Add Category</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection