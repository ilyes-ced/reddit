@foreach ($data as $item)
    {{$item}}
<div class='flex flex-row dark:bg-secondary ' id='{{$item->id}}'>
    <div class='bg-secondary w-10 h-full items-center '>
        <div class=' h-full  bg-main p-2'>
            <x-bi-arrow-up class='w-5 h-5 hover:text-the_red' />
            {{$item->heat}}
            <x-bi-arrow-down class='w-5 h-5 hover:text-the_red'/>
        </div>
    </div>

    <div class='w-full divide-y divide-icons'>
        <div class='p-2'>
            additional information
            
        </div>
    
        <div>
            <div class='p-2 flex  flex-row'>
                <img class='h-8 w-8 bg-black rounded-full' src="../../images/pic1.jpg" alt="">  
                <a href='#' class = 'pl-2 mt-1 font-bold text-white hover:underline'>sub here</a>           
                <p class='mt-1 text-gray-400 pl-1'>. posted by </p>
                <a href='#' class='text-gray-400 mt-1 pl-1 hover:underline'>{{$user_data[$item->owner_id]}}</a>
                <p class='text-gray-400 mt-1 pl-1'> 3h ago</p>
            </div>
            <p class='text-[25px] pl-2 pb-2'>{{$item->title}}</p>
            <a href="#">
                <img src="../../images/pic1.jpg" alt="My logo"/>
            </a>
        </div>


        <div class=' flex flex-row w-full h-full'>
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
@endforeach
