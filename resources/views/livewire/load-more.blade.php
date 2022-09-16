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

{{--
<script type="text/javascript">
    window.onscroll = function (ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
</script>
--}}