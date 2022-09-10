
<nav class="bg-white border-icons px-2 sm:px-4 py-2.5  dark:bg-main border-b">
  <div>

  </div>





  @if (Auth::user())
    {{Auth::user()->username}}
    <form action="{{route('logout')}}" method="post">
      @csrf
      <button>logout</button>
    </form>
  @else
    epiorgjqeoirgjeq^ro
  @endif
</nav>
