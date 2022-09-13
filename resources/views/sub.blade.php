<x-layouts.app>
    

    
    <div>
        <div class='h-60 w-full bg-red-600'>
            <img class='h-60 w-full' src="../../images/pic5.jpg" alt="">
        </div>
        <div class='border-t border-b border-icons p-4 w-full bg-secondary flex flex-row content-center'>
            <img class='border border-icons w-20 h-20 rounded-full' src="../../images/pic1.jpg" alt="">

            <p class='text-[25px] mt-5 mx-4 '>{{$data->name}}</p>  
            @if (Auth::user())
                <button id='join_leave' class='text-[25px] rounded-full bg-the_red   p-6'>join</button>
            @else
                <form action=" {{URL('/')}} " method='post'>
                    @csrf
                    <button  class='text-[25px] rounded-full bg-the_red w-20 h-10 mt-5 mx-10'>join</button>
                </form>
            @endif
        </div>
    </div>
    
    @foreach ($posts as $item)
    <x-item  :item='$item' :subs_data='$subs_data' :user_data='$user_data'/>
    @endforeach
</x-layouts.app>


