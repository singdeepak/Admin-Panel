 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Admin</h1>
             </div>
             <div class="col-sm-6 text-right">
                 <div class="dropdown d-inline-block">
                     <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <img src="{{ asset('images/logo.png') }}" alt="User Icon" with="30" height="30">
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="#">Manage Account</a>
                         <div class="dropdown-divider"></div>
                         <a href="{{ route('admin.logout') }}" class="dropdown-item text-danger">Logout</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
