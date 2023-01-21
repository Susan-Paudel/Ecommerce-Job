@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'All Categories'}}@endsection
    <div class="container">
        @if(Session::has('successMessage'))
        <div class="alert alert-success" role="alert" id="box">
           {{Session::get('successMessage')}}
          </div>
        @endif
        <div class="d-flex bg-light p-2 justify-content-between">
            <h1>All Colors</h1>
            <a href="{{route('colors.create')}}"><button class="btn btn-primary">Add Color</button></a>
        </div>
        <table id="datatable" class="table">
            <thead>
                <tr class="bg-light">
                    <th>id</th>
                    <th>Color Name</th>
                    <th>Color Code</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index=>$a)
                <tr>					
                    <td>{{$a->id}}</td>
                    <td>{{$a->color_name}}</td>	
                    <td>{{$a->color_picker}}</td>
                    <td>@if($a->status=='1')
                        <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Inactive</span>
                    @endif</td>
                    
                    <td>
                        <div class="d-flex">
                            <a href="{{route('colors.edit',['color'=>$a->slug])}}"><button class="btn-sm btn-secondary" data-toggle="tooltip" title='Edit Product'>Edit</button></a>
                            <form action="{{route('colors.destroy',['color'=>$a->slug])}}" method="POST">
                               @csrf
                               @method('delete')
                               <button class="btn-sm btn-warning mx-2 show_confirm" data-toggle="tooltip" title='Delete Product'>Delete</button>
                            </form>
                        </div>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>

    </div>
    <script>
        var table = $('#datatable').DataTable();


  $('.show_confirm').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       swal({
           title: `Are you sure you want to delete this Color?`,
           text: "If you delete this, it will be gone forever.",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
           form.submit();
         }
       });
   });

        </script>
@endsection

