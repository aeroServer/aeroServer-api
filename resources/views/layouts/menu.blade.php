<ul>
    <!--<li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li><a href="#" role="button">Button</a></li> -->
    <li>
        <select id="places" onchange="selectPlace(this.value);">
            @foreach(App\Models\Place::all() as $place)
            <option value="{{ $place->name }}" >{{ $place->name }}</option>
            @endforeach
        </select>
    </li>
</ul>

<script type="text/javascript">
    function selectPlace(place)
    {
        
    }
</script>