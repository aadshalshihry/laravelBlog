<nav>
  <h2 id="logo">Laravel</h2>
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/users">Users</a></li>
    @if(Auth::guard('web')->check())
      <li><a href="/posts">Posts</a></li>
      <li><a href="/user/logout">Logout</a></li>

    	{{-- {{ Form::open(['route' => 'logout', 'method' => 'post', 'class' => 'logout_form']) }}
    		<li>{{ Form::submit('Logout') }}</li>
    	{{ Form::close() }} --}}
      @component('components.logedInNav')

      @endcomponent


    @else
			<li><a href="{{ route('register') }}">Register</a></li>
    	<li><a href="{{ route('login') }}">Login</a></li>
    @endif
    
  </ul>
</nav>
