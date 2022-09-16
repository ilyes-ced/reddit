<div id="user_menu" class="absolute mt-2 right-3.5 hidden z-10 w-44 bg-secondary rounded divide-y divide-gray-100 shadow">
    <div class="py-3 px-4 text-sm  ">
      <div>{{Auth::user()->username}}</div>
      <div class="font-medium truncate">{{Auth::user()->email}}</div>
    </div>
    <ul class="py-1 text-sm  " aria-labelledby="dropdownInformationButton">
      <li>
        <a href="#" class="block py-2 px-4 hover:bg-gray-100  ">Dashboard</a>
      </li>
      <li>
        <a href=" {{URL('/profile_page')}} " class="block py-2 px-4 hover:bg-gray-100  ">profile</a>
      </li> <li>
        <a href="#" class="block py-2 px-4 hover:bg-gray-100  ">settings</a>
      </li>
    </ul>
    <div class="py-1">
        <form action="{{route('logout')}}" method="post" >
            @csrf
            <button class="block py-2 px-4 text-sm  hover:bg-gray-100 ">logout</button>
        </form>
    </div>
  </div>