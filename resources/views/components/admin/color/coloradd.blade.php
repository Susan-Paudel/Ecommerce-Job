@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Add Color'}}@endsection
    <div class="container my-3">
        <form action="{{route('colors.store')}}" method="POST" class="p-4 border" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Add Color</h1>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="colorname" class="form-label">Color Name</label>
                        <input type="text" name="color_name" class="form-control @error('color_name') is-invalid @enderror" id="colorname" placeholder="color name" value="{{old('color_name')}}">
                        @error('color_name')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="colorname" class="form-label">Color Code Picker</label>
                        <input type="color" name="color_picker" class="form-control @error('color_picker') is-invalid @enderror" id="colorname" placeholder="color picker" value="{{old('color_picker')}}">
                        @error('color_picker')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Category Status</label>
                    <select class="form-select  @error('colorStatus') is-invalid @enderror" aria-label="Default select example" name="colorStatus">
                        <option selected disabled>Select Status</option>
                        <option value="1"  {{ old('sizeStatus') == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ old('sizeStatus') == 0 ? "selected" : "" }}>Inactive</option>
                      </select>
                      @error('colorStatus')
                      <span>{{$message.'*'}}</span>
                  @enderror
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-secondary w-100">Add Color</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection