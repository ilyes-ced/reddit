@props(['item','subs_data','user_data'])

    <div class="py-4  cursor-pointer" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border  border-icon">
                <div class="">
                    <div class='flex flex-row dark:bg-secondary ' >
    
                        <div class='bg-main   items-center w-10 text-center '>
                            <div class=' h-100 w-10 bg-main pt-2'>
                                <x-bi-arrow-up wire:click="up_vote({{$item->id}})" class='w-8 h-8 p-1 hover:bg-secondary rounded-full hover:text-the_red mx-auto' />
                                {{$item->heat}}
                                <x-bi-arrow-down wire:click="down_vote({{$item->id}})" class='w-8 h-8 p-1 hover:bg-secondary rounded-full  hover:text-the_red mx-auto'/>
                            </div>
                        </div>
                    
                        <div class='divide-y divide-icons'>
                            <div class='p-2'>
                                additional information
    
                            </div>
                        
                            <div>
                                <div class='p-2 flex  flex-row w-full'>
                                    <img class='h-8 w-8 bg-black rounded-full' src="../../images/pic1.jpg" alt="">  
                                    <a href='/sub/{{$item->sub_id}}' class = 'pl-2 mt-1 font-bold text-white hover:underline'>{{$subs_data[$item->sub_id]->name}}</a>           
                                    <p class='mt-1 text-gray-400 pl-1'>. posted by </p>
                                    <a href='/user/{{$item->owner_id}}' class='text-gray-400 mt-1 pl-1 hover:underline'>{{$user_data[$item->owner_id]->username}}</a>
                                    <p class='text-gray-400 mt-1 pl-1'> 3h ago</p>
                                </div>
                                <p class='text-[25px] pl-2 pb-2'>{{json_decode($item->content)[0]}}</p>
                                <a href="#">
                                    {{--<img src="../../images/{{json_decode($item->images)[0]}}" alt="My logo"/> --}}
                                    <img src="../../images/pic1.jpg" alt="My logo"/>
                                </a>
                            </div>
                        
                        
                            <div class=' flex flex-row w-full h-full '>
                                <a href='#' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                                    <x-bi-chat-square-text class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
                                    comment
                                </a>
                                <a href='#' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
                                    <x-bi-share class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
                                    share
                                </a>
                                <a href='#' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
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