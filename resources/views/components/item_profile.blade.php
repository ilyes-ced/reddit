<div class='mx-8 my-2  border rounded-lg flex flex-row bg-secondary'>

    <div class='rounded-tl-lg rounded-bl-lg bg-main  flex items-center w-10 text-center '>
        <div id='{{$item->id}}' class=' h-100 w-10  '>
            @php
                if(Auth::user()){          
                $col_up = in_array($item->id,json_decode(Auth::user()->up_votes)) ? 'text-the_red' : '';
                $col_down = in_array($item->id,json_decode(Auth::user()->down_votes)) ? 'text-the_red' : ''; 
                }else{
                    $col_up = '';
                    $col_down = '';
                }
            @endphp
            <x-bi-caret-up-fill id='up_vote'  class='{{$col_up}} w-8 h-8 p-1 hover:bg-secondary rounded-full hover:text-the_red mx-auto' />
            <p id='heat_score'>{{$item->heat}}</p> 
            <x-bi-caret-down-fill id='down_vote'  class='{{$col_down}}  w-8 h-8 p-1 hover:bg-secondary rounded-full  hover:text-the_red mx-auto'/>
        </div>
    </div>

    <div class='flex flex-col'>
        <div class='flex flex-row'>
            @if (isset(json_decode($item->content, true)["images"]))
                <div class='p-2 w-64'>
                    <img src="../../images/{{json_decode($item->content)->images[0]}}" alt="My logo"/>
                </div>
            @endif



            <div class='post_clickable ' id='{{$item->id}}'>
                <div class='p-2 flex  flex-row w-full'>
                
                    @if (isset($item->sub))
                        <a href='/sub/{{$item->sub_id}}' class = 'pl-2 mt-1 font-bold text-white hover:underline'>{{$item->sub->name}}</a>           
                    @else
                        <a href='' class = 'pl-2 mt-1 font-bold text-white hover:underline'>[deleted]</a>           
                    @endif
                    <p class='text-gray-400 mt-1 pl-1'> ● posted by </p>
                    @if (isset($item->user))
                        <a href='/user/{{$item->owner_id}}' class='text-gray-400 mt-1 pl-1 hover:underline'>{{$item->user->username}}</a>
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


                    <p class='text-gray-400 mt-1 pl-1'>{{$diff}}</p>
                </div>
                <p class='text-[25px] pl-2 pb-2'>{{json_decode($item->content)->title}}</p>
                {{--<p class='pl-2 pb-2'>{{json_decode($item->content)->body}}</p>--}}
                @if (isset(json_decode($item->content, true)["images"]))
                    <a href="#">
                        {{--<img src="../../images/{{json_decode($item->images)[0]}}" alt="My logo"/> --}}
                    
                    </a>
                @endif
            </div>

        </div>


        <div class=' flex flex-row w-full h-full '>
            <a href='/post/{{$item->id}}' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                <x-bi-chat-square-text class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
                comments
            </a>
            <a    class='cursor-pointer copy_to_clipboard px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                <x-bi-share class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
                share
            </a>
            @php
                if(Auth::user()){          
                    $book = in_array($item->id,json_decode(Auth::user()->bookmarks)) ? 'text-the_red' : '';
                }else{
                    $book = '';
                }
            @endphp
            <a id='{{$item->id}}' class='cursor-pointer bookmark {{$book}} px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                <x-bi-bookmark  class='w-5 h-5 hover:text-the_red mt-1 mr-2'/>
                bookmark 
            </a>
            <a id='{{$item->id}}' class='cursor-pointer edit_this_post px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                <x-bi-pencil  class='w-5 h-5 hover:text-the_red mt-1 mr-2'/>
                edit 
            </a>
            <a id='{{$item->id}}' class='cursor-pointer delete_this_post px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                <x-bi-trash  class='w-5 h-5 hover:text-the_red mt-1 mr-2'/>
                delete 
            </a>
        </div>

    </div>
</div>
