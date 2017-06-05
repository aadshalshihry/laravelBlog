
<li id="dropdownId">
	<div class="dropdown">
		<button class="dropbtn">
			Profile
			<img class="img_dropdown" src="/assets/images/dropdown.png" alt="Dropdown">
		</button>
		<div class="dropdown-content">
			@if(Auth::guard('admin')->check())
				<div class="dropdown-group">
					<p class="dropdown-lebal">Admin Info.</p>
					<p>Name: {{ Auth::guard('admin')->user()->name }}</p>
					<a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Admin Dashboard</a>
					<a href="{{ route('admin.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Admin Logout</a>
				</div>
				
			@endif

			@if(Auth::guard('web')->check())
				<div class="dropdown-group">
					<p class="dropdown-lebal">User Info.</p>
					<p>Name: {{ Auth::guard('web')->user()->name }}</p>
					<a href="{{ route('users.show', Auth::guard('web')->user()->id) }}"><i class="fa fa-tachometer" aria-hidden="true"></i> User Dashboard</a>
				</div>
			@endif
		</div>
	</div>
	
	
</li>