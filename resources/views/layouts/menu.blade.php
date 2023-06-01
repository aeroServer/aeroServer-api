<ul>
    <!--<li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li><a href="#" role="button">Button</a></li> -->
    <li>
        <select id="places" onchange="selectPlace(this.value);">
            @foreach(App\Models\Place::all() as $place)
            @if($loop->first)
            @endif
            <option value="{{ $place->name }}" >{{ $place->name }}</option>
            @endforeach
        </select>
    </li>
</ul>

<script type="text/javascript">
    function selectPlace(place)
    {
        var elem = document.querySelector('#lastPicture');
        elem.src = "/picture/place/"+place;
    }
    @foreach(App\Models\Place::all() as $place)
    @if($loop->first)
    document.addEventListener("DOMContentLoaded", function() {
        selectPlace('{{ $place->name }}');
    });
    @endif
    @endforeach
</script>