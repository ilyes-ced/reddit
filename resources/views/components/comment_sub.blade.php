@foreach ($coms as $item)
<div class='bg-main rounded-sm m-2 flex flex-row'>
    <div class=''>
        @php
            if(Auth::user()){          
            $col_up = in_array($item->id,json_decode(Auth::user()->up_votes)) ? 'text-the_red' : '';
            $col_down = in_array($item->id,json_decode(Auth::user()->down_votes)) ? 'text-the_red' : ''; 
            }else{
                $col_up = '';
                $col_down = '';
            }
        @endphp
        <div id='{{$item->id}}' class=' h-100 w-10  pt-2 text-center'>
            <x-bi-caret-up-fill id='up_vote_comment'  class='{{$col_up}} w-8 h-8 p-1 hover:bg-secondary rounded-full hover:text-the_red mx-auto' />
            <p id='heat_score'>{{$item->heat}}</p> 
            <x-bi-caret-down-fill id='down_vote_comment'  class='{{$col_down}} w-8 h-8 p-1 hover:bg-secondary rounded-full  hover:text-the_red mx-auto'/>
        </div>
    </div>
    <div>
        <div class='px-2 pt-2 flex  flex-row w-full'>
            <img class='h-8 w-8 bg-black rounded-full' src="../../images/pic1.jpg" alt="">  
            @if ($item->user->username)
                <a href='/user/{{$item->owner_id}}' class='text-text_color mt-1 pl-1 hover:underline'> {{$item->user->username}} </a>
            @else
                <a href='' class = 'pl-2 mt-1 font-bold text-white hover:underline'>[deleted]</a>           
            @endif



            @php
            if(((strtotime(now())-strtotime($item->created_at)) )< 3600){
                $diff = floor((strtotime(now())-strtotime($item->created_at))/60).'minutes ago';
            }elseif(((strtotime(now())-strtotime($item->created_at))/3600 )< 24){
                $diff = floor((strtotime(now())-strtotime($item->created_at))/3600).'hrs ago';
            }else{
                $diff = floor((strtotime(now())-strtotime($item->created_at))/3600/24).'days ago';
            }
            @endphp




            <p class='text-gray-400 mt-1 pl-1'> ● {{$diff}}</p>
        </div>
        <div class='p-2 flex flex-row '>
            <div class='border mx-4'></div>
            {{$item->content}}      
        </div>
        <div class='px-4'>
            <a class='cursor-pointer px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                <x-bi-chat-square-text class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
                reply
            </a>
        </div>
    </div>

</div>


<div  class='flex flex_row divide-x ml-3'>
    <div class=''></div>
    <div class='ml-4 w-full'>
       <x-comment_sub :item='$item->replies' /> 
    </div>
</div>  





@endforeach