<x-layouts.app>


<div class='flex flex-row w-full px-6 border-b space-x-4 font-medium text-lg py-2'>
    <div id='general_toggle' class='py-1  px-2 cursor-pointer rounded-lg border bg-secondary text-the_red hover:text-the_red'>general</div>
    <div id='posts_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>posts</div>
    <div id='' class='py-1  px-2 cursor-pointer hover:text-the_red'></div>
    <div id='subs_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>my subs</div>
    <div id='comments_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>comments</div>
    <div id='bookmarks_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>bookmarks</div>
    <div id='liked_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>liked</div>
    <div id='disliked_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>disliked</div>
</div>












<div id='general_data'>
    <div class='m-6'></div>

@foreach ($posts as $item)
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





        <div class='p-2 w-64'>
            <img src="../../images/{{json_decode($item->content)->images[0]}}" alt="My logo"/>
        </div>




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
@endforeach
</div>





<div id='posts_data'>11111111</div>
<div id='subs_data'>222222222</div>
<div id='comments_data'>33333333</div>
<div id='bookmarks_data'>4444444444</div>
<div id='liked_data'>555555555555</div>
<div id='disliked_data'>6666666666</div>






























</x-layouts.app>