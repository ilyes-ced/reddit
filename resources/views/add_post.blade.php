<x-layouts.app>

    <div>
        <select required id='main_select' class="w-4/12 p-2 bg-secondary rounded-lg border mx-8 mt-8">
            <option selected disabled>Choose a sub to post in</option>
            @if (Auth::user())
                @foreach ($subs as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            @endif
        </select>
        
          


        <div class='border bg-main rounded-lg m-8 space-y-2'>
            <div  class='border-b flex flex-row divide-x-2'> 
                <button id='post_type' class='w-1/2 rounded-tl-lg bg-secondary text-the_red justify-center  p-2 flex flex-row'><x-bi-text-paragraph class='h-6 w-6 mx-2' />Post</button>
                <button id='image_type' class='w-1/2 rounded-tr-lg   p-2 flex flex-row  justify-center'><x-bi-card-image class='h-6 w-6 mx-2' />Images</button>
            </div>
            @if ($errors->any())
            <div class="flex justify-center text-center text-the_red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class='p-8'>
                <div id='post_type_div'>
                    <x-input_box  /> 
                </div>
                <div id='image_type_div' class='hidden'>
                    <x-input_image_box  /> 
                </div>
            </div>
        </div>
     

    </div>
    
</x-layouts.app>