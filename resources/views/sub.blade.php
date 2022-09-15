<x-layouts.app>
    

    
    <div>
        <div class='h-60 w-full bg-red-600'>
            <img class='h-60 w-full' src="../../images/pic5.jpg" alt="">
        </div>
        <div id='{{$data->id}}' class='border-t border-b border-icons p-4 w-full bg-secondary flex flex-row content-center'>
            <img class='border border-icons w-20 h-20 rounded-full' src="../../images/pic1.jpg" alt="">

            <p class='text-[25px] mt-5 mx-4 '>{{$data->name}}</p>  
            @if (Auth::user())
                @if (in_array($data->id,json_decode(Auth::user()->joined_subs)))
                    <button id='join_leave' class=' text-[25px] bg-transparent border-the_red self-center border-2 hover:text-white hover:bg-main rounded-lg p-2 px-6 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 duration-200 cursor-pointer'>leave</button> 
                @else                    
                    <button id='join_leave' class='text-main text-[25px] bg-the_red self-center border-2 hover:text-white hover:bg-main rounded-lg p-2 px-6 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 duration-200 cursor-pointer'>join</button> 
                @endif
            @else
                <form action=" {{URL('/join_leave_sub_auth')}} " class='self-center' method='post'>
                    @csrf
                    <input type="hidden" name="sub_id" value='{{$data->id}}'>
                    <button  class='text-main text-[25px] bg-the_red self-center border-2 hover:text-white hover:bg-main rounded-lg p-2 px-6 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 duration-200 cursor-pointer'>join</button> 
                </form>
            @endif

           
        </div>
    </div>
    
    @foreach ($data->post as $item)
    <x-item  :item='$item'/>
    @endforeach
</x-layouts.app>


