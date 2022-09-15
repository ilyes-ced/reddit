<x-layouts.app>

    <div class='' id='posts_cont'>
        @if (Auth::user())
            <x-add_post />
        @endif
        
        <x-extra_bar />
        
        @foreach ($post as $item)
            <x-item  :item='$item' />
        @endforeach
        </div>
        <div id='hihi'></div>
 
</x-layouts.app>



   
{{-- $post->links() --}}

