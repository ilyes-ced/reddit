<x-layouts.app>


<div class='flex flex-row w-full px-6 border-b space-x-4 font-medium text-lg py-2'>
    <div id='general_toggle' class='py-1  px-2 cursor-pointer rounded-lg border bg-secondary text-the_red hover:text-the_red'>general</div>
    <div id='posts_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>posts</div>
    <div id='history_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>history</div>
    <div id='subs_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>my subs</div>
    <div id='comments_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>comments</div>
    <div id='bookmarks_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>bookmarks</div>
    <div id='liked_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>liked</div>
    <div id='disliked_toggle' class='py-1  px-2 cursor-pointer hover:text-the_red'>disliked</div>
</div>









<div class='m-6'></div>


<div id='general_data'>

    @foreach ($posts as $item)
        <x-item_profile :item='$item' />
    @endforeach
</div>




<div id='posts_data'>11111111</div>
<div id='history_data'>history</div>


<div id='subs_data'>
    @foreach ($subs as $item)
        <x-sub_profile :item='$item' />
    @endforeach
</div>









<div id='comments_data'>
    <x-comment  :comments='$comments'/>
</div>












<div id='bookmarks_data'>
    @foreach ($bookmarks as $item)
        <x-item_profile :item='$item' />
    @endforeach
</div>




<div id='liked_data'>
    @foreach ($up_votes as $item)
    <x-item_profile :item='$item' />
@endforeach
</div>


<div id='disliked_data'>
        @foreach ($down_votes as $item)
    <x-item_profile :item='$item' />
@endforeach
</div>






























</x-layouts.app>
