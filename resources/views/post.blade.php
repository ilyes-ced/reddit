
<x-layouts.app>

<div class="mx-8 mt-4 bg-secondary rounded-lg  border  border-icon">
   <div class=' flex flex-row '> 

    <div class=''>  
        <div  class=' '>
            @php
                if(Auth::user()){          
                $col_up = in_array($data->id,json_decode(Auth::user()->up_votes)) ? 'text-the_red' : '';
                $col_down = in_array($data->id,json_decode(Auth::user()->down_votes)) ? 'text-the_red' : ''; 
                }else{
                    $col_up = '';
                    $col_down = '';
                }
            @endphp
            <div id='{{$data->id}}' class=' h-100 w-10  pt-2 text-center'>
                <x-bi-caret-up-fill id='up_vote'  class='{{$col_up}} w-8 h-8 p-1 hover:bg-secondary rounded-full hover:text-the_red mx-auto' />
                <p id='heat_score'>{{$data->heat}}</p> 
                <x-bi-caret-down-fill id='down_vote'  class='{{$col_down}}  w-8 h-8 p-1 hover:bg-secondary rounded-full  hover:text-the_red mx-auto'/>
            </div>
        </div>
    </div>

    <div class=''>
        <div class='flex flex-row pt-2'>
            @if (isset($data->sub))
                <img class='h-8 w-8 bg-black rounded-full' src="../../images/pic1.jpg" alt="">  
                <a href='/sub/{{$data->sub->id}}' class = 'pl-2 mt-1 font-bold text-white hover:underline'>{{$data->sub->name}}</a>           
            @else
                <a href='' class = 'pl-2 mt-1 font-bold text-white hover:underline'>[deleted]</a>           
            @endif
            <p class='text-gray-400 mt-1 pl-1'> ● posted by </p>
            @if (isset($data->user))
                <a href='/user/{{$data->user->id}}' class='text-gray-400 mt-1 pl-1 hover:underline'>{{$data->user->username}}</a>
            @else
                <a href='' class = 'pl-2 mt-1 font-bold text-white hover:underline'>[deleted]</a>           
            @endif
            
            @php

                if(((strtotime(now())-strtotime($data->created_at))/3600 )< 24){
                    $diff = floor((strtotime(now())-strtotime($data->created_at))/3600).'hrs ago';
                }else{
                    $diff = floor((strtotime(now())-strtotime($data->created_at))/3600/24).'days ago';
                }

            @endphp

    
    <p class='text-gray-400 mt-1 pl-1'>{{$diff}}</p>
        </div>
        <p class='text-[25px] my-2'>{{json_decode($data->content)->title}}</p>

        @if (isset(json_decode($data->content, true)["body"]))
            <p class='mb-4  '>{{json_decode($data->content)->body}}</p>
        @endif
    
        @if (isset(json_decode($data->content, true)["images"]))
            <div class='hover_hide flex items-center '>
                <button class='prev_img hidden absolute rounded-tr-lg rounded-br-lg h-10 bg-[rgb(0,0,0,0.5)] hover:border-r hover:border-black'><x-bi-chevron-left class='h-10 w-6' /></button>
                <button class='next_img hidden absolute right-0 rounded-tl-lg rounded-bl-lg h-10 bg-[rgb(0,0,0,0.5)] hover:border-l hover:border-black'><x-bi-chevron-right class='h-10 w-6' /></button>
                <div class='img_index hidden  absolute bg-[rgb(0,0,0,0.5)] p-2.5 rounded-lg left-1/2 '> 1 / {{count(json_decode($data->content, true)["images"])}}</div>
                <div class='images_div mx-auto '>
                    @foreach (json_decode($data->content)->images as $img_src)
                        @if ($loop->first)
                            <img id='ffff' class='main_image' src="../../images/{{$img_src}}" alt="My logo"/>
                        @else
                            <img class='hidden main_image' src="../../images/{{$img_src}}" alt="My logo"/>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    @php
    if(Auth::user()){          
        $book = in_array($data->id,json_decode(Auth::user()->bookmarks)) ? 'text-the_red' : '';
    }else{
        $book = '';
    }
    @endphp

   </div>
   <div class='px-10 py-2 flex flex-row w-full '>
    <a href='' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-chat-square-text class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
        comments
    </a>
    <a  class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-share class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
        share
    </a>
    <a id='{{$data->id}}' class=' {{$book}} bookmark px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-bookmark  class='w-5 h-5 hover:text-the_red mt-1 mr-2'/>
        bookmark 
    </a>
    </div>
</div>
<div class='m-8'>
@if ($errors->any())
<div class="flex justify-center">
    <ul>
        @foreach ($errors->all() as $error)
            <li class='text-the_red'>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>

















<livewire:input-boc-comment :post_id="$data->id"/>











{{--
<x-input_box_comment :post_id="$data->id"/>


<div class="m-8 p-4  bg-secondary rounded-lg  border  border-icon">
    <div class='' id='add_coments_here'>
        @if (count($comments)==0)
            <p id='no_comments' class='text-[25px] text-center'>no comments yet</p>
        @endif
        <x-comment :comments='$data->comment' /> 
    </div>
</div>
--}}






{{--
<livewire:input-boc-comment :post_id="$data->id"/>
--}}


{{--
<div class="m-8 p-4  bg-secondary rounded-lg  border  border-icon">

    <div class=''>
        
        @if (count($comments)==0)
            <p class='text-[25px] text-center'>no comments yet</p>
        @endif

            <x-comment :comments='$comments' /> 
        
     
    </div>
</div>
--}}
</x-layouts.app>



{{--
        @foreach ($comments as $item)
            <x-comment :item='$item' />   
                @foreach ($sub_comments as $sub_item)
                    @if ($sub_item->parent_comment_id==$item->id)
                        <div  class='flex flex_row divide-x ml-3'>
                            <div class=''></div>
                            <div class='ml-4 w-full'>
                                <x-comment :item='$sub_item' />
                            </div>
                        </div>
                    @endif
                @endforeach
        @endforeach
        
    --}}