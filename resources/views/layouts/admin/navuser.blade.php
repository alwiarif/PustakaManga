<li class="dropdown navbar-user">
  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
    <span class="d-none d-md-inline">{{Auth::user()->name}}</span> <b class="caret"></b>
  </a>
  <div class="dropdown-menu dropdown-menu-right">
    <div class="dropdown-divider"></div>
    <form action="{{route("logout")}}" method="POST">
        @csrf
       <button class="dropdown-item" style="cursor:pointer">SignOut</button>
       </form>
  </div>
</li>
