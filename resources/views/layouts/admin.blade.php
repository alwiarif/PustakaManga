<!DOCTYPE html>
<html lang="en">
	@include('layouts.admin.head')
	<body>
		<!-- begin #page-loader -->
		<div id="page-loader" class="fade show"><span class="spinner"></span></div>
		<!-- end #page-loader -->

		<!-- begin #page-container -->
		<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
			<!-- begin #header -->
			<div id="header" class="header navbar-default">
				@include('layouts.admin.header')
				@include('layouts.admin.navbar')
			</div>
			<!-- end #header -->

			@include('layouts.admin.sidebar')
			@include('layouts.admin.content')
			{{-- @include('layouts.admin.themepanel') --}}

			<!-- begin scroll to top btn -->
			<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
			<!-- end scroll to top btn -->
		</div>
		<!-- end page container -->
		@include('layouts.admin.scripts')
	</body>
</html>
