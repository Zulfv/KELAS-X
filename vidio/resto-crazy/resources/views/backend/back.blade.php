<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> admin page resto CRAYZ</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="mt-4">
           <nav class="navbar navbar-expand-lg bg-body-tertiary" >
               <div class="container-fluid">
                <h2>admin page</h2>
                   <ul class="navbar-nav gap-5">
                     <li class="nav-item">{{ Auth::user()->email }}</li>
                     <li class="nav-item">{{ Auth::user()->level }}</li>
                     <li class="nav-item"><a href="{{ url('admin/logout') }}">logout</a></li>
                   </ul>
               </div>
           </nav>
        </div>
        <div class="row mt-4">
            <div class="col-2">
                 <ul class="list-group">
                      @if (Auth::user()->level == 'admin') 
                        <li class="list-group-item"><a href="{{ url('admin/user') }}">user</a></li>
                      @endif  
                      @if (Auth::user()->level == 'kasir') 
                        <li class="list-group-item"><a href="">order</a></li> 
                        <li class="list-group-item"><a href="">order detail</a></li> 

                     @endif  
                      @if (Auth::user()->level == 'manager')
                        <li class="list-group-item"><a href="{{ url('admin/kategori') }}">kategori</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/menu') }}">menu</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/pelanggan') }}">pelanggan</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/order') }}">order</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/orderdetail') }}">order detail</a></li>
                      @endif 
                 </ul>
            </div>
            <div class="col-10">
                @yield('admincontent')
            </div>
        </div>  
        <div class="bg-light mt-5">
            <p class="text-center">@RESTO-CRAZYY</p> 
         </div>
     </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>