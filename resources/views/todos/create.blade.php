@extends('todos.layout')

@section('content1')
				<div class="card-header"><h1 style="text-align: center;">{{ __('What next you need To-Do !') }}</h1></div>
				<a style="text-align:center; padding: 10px; cursor: pointer; border: 1px solid orange; background-color: dodgerblue; text-decoration: none; color: white; font-weight: bolder;" href="/todos/"><u> Click Here to View All To-Do's</u></a>
                <div class="card-body">
                    <form style="text-align: center; padding-left: 8%; padding-right: 8%;" method="post" action="/todos/create" >
						
						@csrf
						<div class="form-group row" >
							<h5 style="text-align: left;">Add Title</h5>
							<input type="text" name="title" style="width: 100%; " required="true">
						</div>
						<div class="form-group row">
							<h5 style="text-align: left;">Add Description</h5>
							<textarea name="description" style="width: 100%; " required="true"></textarea>
						</div>
						@livewire('step')
						<!--div class="form-group row">
							<h4 style="text-align: center; padding-top: 15px; padding-bottom: 15px; margin: 0 auto;"><b>Add Steps  </b><span class="fa fa-plus fa-sm" style="cursor: pointer; padding-left: 5px;"></span></h4>
							<input type="text" name="steps" style="width: 100%; " required="true" placeholder="step 1">
						</div-->
						<input type="submit" value="Create" style="width: 20%;">
					</form>
					
                </div>



@endsection
