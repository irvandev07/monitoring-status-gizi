<style type="text/css">
    .user-icon { 
      height: auto;
      width: 28px;
      margin-right: 2px;
      margin-left: 10px;
    }
    .font-user {
      font-size: 14px;
      color: dimgray;
    }
    .vl {
      border-left: 1.5px solid rgb(199, 199, 199);
      height: 20px;
      position: relative;
      margin: 10px;
      
    }
   
}

}
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">
          <i class="fas fa-align-left"></i>
        </a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right  mt-2">
          <h6 class="dropdown-header">Messages Center</h6>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right  mt-2">
          <h6 class="dropdown-header">Notifications Center</h6>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <div class="vl"></div>
      <div class="dropdown ">
        <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="font-user mt-1">{{auth()->user()->name}}</span> <img src="{{asset('adminLTE/img/avatar_icon3.png')}}" class="user-icon image img-circle" alt="User Image"> 
        </a>
        <div class="dropdown-menu dropdown-menu-right align-tr-br mt-2" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item font-user" href="/profile">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i></ion-icon>Profile
          </a>
          <a class="dropdown-item font-user" href="/pengaturan">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i></ion-icon>Pengaturan
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item font-user" href="/logout">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></ion-icon>Keluar
          </a>
        </div>
      </div>
      
    </ul>
  </nav>
