
<x-layouts.app>

  <form action="{{route('login')}}" method="post">
    @csrf
    <input type="text" name='email' placeholder="email">
    <input type="text" name='password' placeholder="password">
    <button>submit</button>
  </form>


</x-layouts.app>
    
    