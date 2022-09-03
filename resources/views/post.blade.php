
<x-layouts.app>

<div class="m-10 bg-secondary">

   
    {{$data}}



    @foreach ($comments as $item)
        <x-comment :item='$item' />       
    @endforeach


</div>
    
</x-layouts.app>
    
