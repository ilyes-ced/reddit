<x-layouts.app>

@if (Auth::user())
    
    <x-add_post />
@endif
<x-extra_bar />

@foreach ($post as $item)
    <x-item  :item='$item' :subs_data='$subs_data' :user_data='$user_data'/>
@endforeach
{{ $post->links() }}



</x-layouts.app>


