<div>
    @if(session()->has('message'))
	<div class="alert alert-success" style="text-align: center;"><b><h4>{{session()->get('message')}}</h4></b></div>
	@elseif(session()->has('error'))
	<div class="alert alert-danger" style="text-align: center;"><b><h4>{{session()->get('error')}}</h4></b></div>
	@endif<!-- Order your soul. Reduce your wants. - Augustine -->



	@if ($errors->any())
	    <div class="alert alert-danger" style="text-align: center;">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <b><h4>{{ $error }}</h4></b>
	            @endforeach
	        </ul>
	    </div>
	@endif
</div>





