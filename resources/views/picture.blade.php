@extends('layouts.app')
@section('content')
	<img id="lastPicture" onclick="displayFullPicture(this.src)" style="cursor: zoom-in;" src="">
	<script type="text/javascript">
		setTimeout(() => {
		  location.reload();
		}, "60000");

		function displayFullPicture(src)
		{
			var elem = document.querySelector('#fullPicture');
			elem.style.backgroundImage = "url('"+src+"')";
			elem.style.display = 'block';
			//alert(src);
		}

		function hideFullPicture()
		{
			var elem = document.querySelector('#fullPicture');
			elem.style.display = 'none';
		}
	</script>
@endsection