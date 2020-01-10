<!-- begin sidebar nav -->
<ul class="nav">
  <li class="nav-header">Navigation</li>
  <li>
    <a href="{{ route('dashboard.index') }}">
      <i class="fas fa-chart-pie"></i>
      <span>Chart Post</span>
    </a>
  </li>
  <li class="has-sub">
    <a href="#">
      <b class="caret"></b>
      <i class="fas fa-book fa-fw "></i>
      <span>Manga Manage</span>
    </a>
    <ul class="sub-menu">
      <li><a href="{{ route('manga.index') }}">Manga List</a></li>
      <li><a href="{{ route('manga.create') }}">Manga Create</a></li>
    </ul>
  </li>
  <li class="has-sub">
    <a href="#">
      <b class="caret"></b>
      <i class="fas fa-bookmark fa-fw "></i>
      <span>Genre Manage</span>
    </a>
    <ul class="sub-menu">
      <li><a href="{{ route('genre.index') }}">Genre List</a></li>
      <li><a href="{{ route('genre.create') }}">Genre Create</a></li>
    </ul>
  </li>
  <!-- begin sidebar minify button -->
  <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
  <!-- end sidebar minify button -->
</ul>
<!-- end sidebar nav -->
