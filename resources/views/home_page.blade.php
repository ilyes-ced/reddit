<x-layouts.app>


<div class=''>
@if (Auth::user())
    <x-add_post />
@endif

<x-extra_bar />

@foreach ($post as $item)
    <x-item  :item='$item' :subs_data='$subs_data' :user_data='$user_data'/>
@endforeach
{{ $post->links() }}
</div>


</x-layouts.app>


