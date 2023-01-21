@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Edit Logo'}}@endsection
    <div class="container my-3">
        <form action="{{route('logos.update',['logo'=>$data->slug])}}" method="POST" class="p-4 border" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 bg-light mb-3">
                    <h1>Edit Logo</h1>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="colorname" class="form-label">Logo Name</label>
                        <input type="file" name="img_logo_name" class="form-control @error('img_logo_name') is-invalid @enderror">
                        <a href="{{asset('demo/'.$data->img_logo_name)}}" target="_blank"><img src="{{asset('demo/'.$data->img_logo_name)}}" alt="image" class="p-2" style="height:200px;width:200px"/></a>
                        @error('img_logo_name')
                            <span>{{$message.'*'}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Logo Status</label>
                    <select class="form-select  @error('Status') is-invalid @enderror" aria-label="Default select example" name="Status">
                        <option selected disabled>Select Status</option>
                        <option value="1"  {{ $data->status == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ $data->status == 0 ? "selected" : "" }}>Inactive</option>
                      </select>
                      @error('Status')
                      <span>{{$message.'*'}}</span>
                  @enderror
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-secondary w-100">Edit Logo</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection