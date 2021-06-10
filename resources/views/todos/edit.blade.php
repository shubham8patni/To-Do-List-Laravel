@extends('todos.layout')

@section('content1')
				<div class="card-header"><h1 style="text-align: center;">{{ __('Edit your To-Do!') }}</h1></div>
				<a style="text-align:center; padding: 10px; cursor: pointer; border: 1px solid orange; background-color: dodgerblue; text-decoration: none; color: white; font-weight: bolder;" href="/todos/"><u> Click Here to View All To-Do's</u></a>
                <div class="card-body">
                    <form style="text-align: center; padding-left: 8%; padding-right: 8%;" method="post" action="{{route('todo.update', $todo->id)}}" >
						@method('PATCH')
						@csrf

						<div class="form-group row" >
							<h5 style="text-align: left;">Update Title</h5>
							<input type="text" name="title" style="width: 100%; " value="{{$todo->title}}" required="true">
						</div>

						<div class="form-group row">
							<h5 style="text-align: left;">Update Description</h5>
							<textarea name="description" style="width: 100%;" required="true">{{$todo->description}}</textarea>
						</div>

						@if($todo->steps->count() > 0)

		                <h2 style="text-align: center; padding-top: 10px;" >Steps :</h2>
		                

		                	
								@livewire('edit-step', ['steps' => $todo->steps])

		             

							
		              
		                @endif

						<input type="submit" value="Update" style="width: 15%;">
					</form>
                </div>



@endsection
