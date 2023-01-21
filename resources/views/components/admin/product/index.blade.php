@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'All Product'}}@endsection
    <div class="container">
        @if(Session::has('successMessage'))
        <div class="alert alert-success" role="alert" id="box">
           {{Session::get('successMessage')}}
          </div>
        @endif
        <div class="d-flex bg-light p-2 justify-content-between">
            <h1>All Products</h1>
            <a href="{{route('products.create')}}"><button class="btn btn-primary">Add Product</button></a>
        </div>
        <table id="datatable" class="table">
            <thead>
                <tr class="bg-light">
                    <th>id</th>
                    <th>Product Name</th>
                    <th>Product_Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot style="display:table-header-group;">
                <tr>
                    <th>id</th>
                    <th>Product Name</th>
                    <th>Prodcut_Category</th>
                </tr>  
                </tfoot>
                <tbody>
                @foreach($data as $index=>$a)
                <tr>					
                    <td>{{$a->id}}</td>
                    <td>{{$a->Product_Name}}</td>
                    <td>{{$a->category_name}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('products.edit',['product'=>$a->slug])}}"><button class="btn-sm btn-secondary" data-toggle="tooltip" title='Edit Product'>Edit</button></a>
                            <form action="{{route('products.destroy',['product'=>$a->slug])}}" method="POST">
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
 
 $('#datatable tfoot th').each( function (i) {
     var title = $(this).text();
     //console.log(title);
     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

     $( 'input', this ).on( 'keyup change', function () {
         if ( table.column(i).search() !== this.value ) {
             table
                 .column(i)
                 .search( this.value )
                 .draw();
         }
     });
 });



  $('.show_confirm').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
       swal({
           title: `Are you sure you want to delete this Product?`,
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

