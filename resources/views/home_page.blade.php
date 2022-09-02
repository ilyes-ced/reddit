<x-layouts.app>
    {{$data}}
    @foreach ($data as $item)
        {{--    <x-item :item='$item' :subs_data='$subs_data' :user_data='$user_data'/>
 --}}    
        {{$item}}

        <br><br><br><br><br>
    @endforeach
</x-layouts.app>


