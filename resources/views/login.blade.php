<!DOCTYPE html>
<html class='dark' lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class='bg-main text-text_color h-screen flex items-center  justify-center'>







      <div class='border bg-secondary rounded-lg  p-8 w-[600px]'>
        

        <p class='text-[25px] font-bold mb-4'>Welcome back</p>
        <div class='flex flex-row'>
          <button class='border rounded-lg w-1/2 mr-2 h-10 bg-main flex flex-row  items-center  justify-center hover:bg-secondary hover:text-the_red'><x-bi-google class='mx-2'/>Log in with google</button>          
          <button class='border rounded-lg w-1/2 ml-2 h-10 bg-main flex flex-row items-center  justify-center hover:bg-secondary hover:text-the_red '><x-bi-facebook class='mx-2'/>Log in with facebook</button>
        </div>


        <div class='flex flex-row items-center mt-2'>

          <hr class="w-96 h-0.5 bg-icons " />
          <div class='m-4'>OR</div>
          <hr class="w-96 h-0.5 bg-icons " />
        </div>
      

        <div>
          <form action="{{route('login')}}" method="post" class='flex flex-col'>
            @csrf
            <label class='mb-2' for="email">Email</label>
            <input class='mb-4 pl-2 h-10 bg-main rounded-lg border' type="text" name='email' placeholder="email">
            <label class='mb-2' for="password">Password</label>
            <input class='pl-2 h-10 bg-main rounded-lg border' type="text" name='password' placeholder="password">
            <div class='flex justify-between my-4' >
              <div>
                <input class='' type="checkbox" name="checkbox" id="">
                <label for="checkbox">remember me</label>
              </div>

              <a href="" class='text-the_red underline' >forgot password</a>
            </div>
            
            <button class='w-full bg-the_red rounded-lg h-10 mb-4 hover:bg-main hover:border hover:border-the_red'>submit</button>
            @if ($errors->any())
<div class="flex justify-center">
    <ul>
        @foreach ($errors->all() as $error)
            <li class='text-the_red'>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
          </form>
          dont you have accoutn?  <a href="{{URL('/register')}}" class='underline text-the_red'>sign up here</a>
        </div>
      </div>









    </body>
</html>