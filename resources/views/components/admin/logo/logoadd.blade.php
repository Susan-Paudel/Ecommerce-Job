@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Add Logo'}}@endsection
    <div class="container my-3">
        <form action="{{route('logos.store')}}" method="POST" class="p-4 border" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Add Logo</h1>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="colorname" class="form-label">Logo Image</label>
                        <input type="file" name="logo_img" class="form-control @error('logo_img') is-invalid @enderror" id="logo_img"/>
                        @error('logo_img')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Logo Status</label>
                    <select class="form-select  @error('logoStatus') is-invalid @enderror" aria-label="Default select example" name="logoStatus">
                        <option selected disabled>Select Status</option>
                        <option value="1"  {{ old('logoStatus') == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ old('logoStatus') == 0 ? "selected" : "" }}>Inactive</option>
                      </select>
                      @error('logoStatus')
                      <span>{{$message.'*'}}</span>
                  @enderror
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-secondary w-100">Add Logo</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection