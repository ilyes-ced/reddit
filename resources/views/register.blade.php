
<x-layouts.app>
    
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif


    <form action="{{route('register')}}" method="post">
      @csrf
        <input type="text" name='username' placeholder="username">

      <input type="text" name='email' placeholder="email">
      <input type="text" name='password' placeholder="password">
      <input type="text" name='password_confirmation' placeholder="password_confirmation">

      <button>submit</button>
    </form>
  
  
  </x-layouts.app>
      
      