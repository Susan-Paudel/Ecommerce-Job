<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MBL9SFC95M"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MBL9SFC95M');
</script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        form span{
            color:red;
        }
    </style>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha512-0nkKORjFgcyxv3HbE4rzFUlENUMNqic/EzDIeYCgsKa/nwqr2B91Vu/tNAu4Q0cBuG4Xe/D1f/freEci/7GDRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">
</head>
<body>
    <body class="sidebar-mini" data-new-gr-c-s-check-loaded="14.1085.0" data-gr-ext-installed="" style="height: auto;">
        <div class="wrapper">
        
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        
        <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
        </li>
        </ul>
        
        <ul class="navbar-nav ml-auto">    
        <li class="nav-item dropdown">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-transparent">
            <i class="fa fa-sign-out"></i>
            </button>
        </form>
       
        
        </li>
        <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
        </a>
        </li>
        </ul>
        </nav>
        
        
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        
        <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
        </a>
        
        <div class="sidebar">
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
        </div>
        
        
        
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fab fa-codiepie"></i>
                <p>
                 Category
                <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link text-center">
                <p>Add Category</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link text-center">
                    <p>View Category</p>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fab fa-product-hunt"></i>
                <p>
                 Product
                <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('products.create')}}" class="nav-link text-center">
                <p>Add Product</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.index')}}" class="nav-link text-center">
                    <p>View Product</p>
                    </a>
                    </li>
                </ul>
            </li>
           
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-paint-brush"></i>
                <p>
                 Color
                <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('colors.create')}}" class="nav-link text-center">
                <p>Add Color</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('colors.index')}}" class="nav-link text-center">
                    <p>View Color</p>
                    </a>
                    </li>
                </ul>
            </li> 
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-text-height"></i>
                <p>
                 Size
                <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('sizes.create')}}" class="nav-link text-center">
                <p>Add Size</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sizes.index')}}" class="nav-link text-center">
                    <p>View Size</p>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-text-height"></i>
                <p>
                 Logo
                <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('logos.index')}}" class="nav-link text-center">
                    <p>View Logo</p>
                    </a>
                    </li>
                </ul>
            </li>
        </ul>
        </nav>
        
        </div>
        
        </aside>
        
        <div class="content-wrapper">    
        <div class="content">
        <div class="container-fluid">
        <div class="row">
       
        @yield('admin-content')
        </div>
        
        </div>
        </div>
        
        </div>
        
        
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
        
        <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
        </div>
        </aside>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );   


      setTimeout(() => {
  const box = document.getElementById('box');
  box.style.display = 'none';
}, 1000);
    </script>
</body>
</html>
