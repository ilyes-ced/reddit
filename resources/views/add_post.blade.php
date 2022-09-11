<x-layouts.app>

    <div>
        <select id="countries" class="w-4/12 p-2 bg-secondary rounded-lg border mx-8 mt-8">
            <option selected>Choose a country</option>
            @if (json_decode(Auth::user()->my_subs))
                @foreach (json_decode(Auth::user()->my_subs) as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
            @endif
          </select>
        
          


        <div class='border bg-main rounded-lg m-8 space-y-2'>
            <div  class='border-b flex flex-row divide-x-2'> 
                <button class='w-1/2 rounded-tl-lg bg-secondary text-the_red justify-center  p-2 flex flex-row'><x-bi-text-paragraph class='h-6 w-6 mx-2' />Post</button>
                <button class='w-1/2 rounded-tr-lg   p-2 flex flex-row  justify-center'><x-bi-card-image class='h-6 w-6 mx-2' />Images</button>
            </div>
            <div class='p-8'>
                <input  class='mb-4 p-2 rounded-lg bg-main border  w-full'  placeholder='title' type="text">
                <x-input_box /> 
            </div>
        </div>
     

        save icons
    </div>

    
</x-layouts.app>