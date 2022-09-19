
    <div id='{{$item->id}}' class=" py-4  cursor-pointer "  >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg border  border-icon">
                <div class="">
                    <div class='flex flex-row dark:bg-secondary ' >
    
                        <div class='bg-main   items-center w-10 text-center '>
                            <div id='{{$item->id}}' class=' h-100 w-10 bg-main pt-2 '>
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
                    
                        <div class='divide-y divide-icons  w-full' id='{{$item->id}}'>
                            <div class='p-2'>
                                additional information
    
                            </div>
                        
                            <div class='post_clickable' id='{{$item->id}}'>
                                <div class='p-2 flex l flex-row w-full'>
                                
                                    @if (isset($item->sub))
                                        <img class='h-8 w-8 bg-black rounded-full' src="../../images/pic1.jpg" alt="">  
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
                                <p class='pl-2 pb-2'>{{json_decode($item->content)->body}}</p>
                                @if (isset(json_decode($item->content, true)["images"]))
                                    
                                    {{--<img src="../../images/{{json_decode($item->images)[0]}}" alt="My logo"/> --}}
                                    <div class='hover_hide flex items-center '>
                                        <button class='prev_img hidden absolute  rounded-tr-lg rounded-br-lg h-10 bg-[rgb(0,0,0,0.5)] hover:border-r hover:border-black'><x-bi-chevron-left class='h-10 w-6' /></button>
                                        <button class='next_img hidden absolute  right-6  rounded-tl-lg rounded-bl-lg h-10 bg-[rgb(0,0,0,0.5)] hover:border-l hover:border-black'><x-bi-chevron-right class='h-10 w-6' /></button>
                                        <div class='img_index hidden absolute bg-[rgb(0,0,0,0.5)] p-2.5 rounded-lg left-1/2 '> 1 / {{count(json_decode($item->content, true)["images"])}}</div>
                                        @foreach (json_decode($item->content)->images as $img_src)
                                            @if ($loop->first)
                                                <img class='main_image mx-auto' src="../../images/{{$img_src}}" alt="My logo"/>
                                            @else
                                                <img class='hidden mx-auto main_image' src="../../images/{{$img_src}}" alt="My logo"/>
                                            @endif
                                        @endforeach
                                        
                                    </div>
                                
                                    
                                @endif
                            </div>
                        
                        
                            <div class=' flex flex-row w-full h-full '>
                                <a href='/post/{{$item->id}}' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                                    <x-bi-chat-square-text class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
                                    comments
                                </a>
                                <a    class='copy_to_clipboard px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
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
                                <a id='{{$item->id}}' class='bookmark {{$book}} px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                                    <x-bi-bookmark  class='w-5 h-5 hover:text-the_red mt-1 mr-2'/>
                                    bookmark 
                                </a>
                            </div>
                        </div>
                    </div>    
                    
                    
    
                </div>
            </div>
        </div>
    </div>