@extends('todos.layout')

@section('content1')

                <div class="card-header" style="display: flex; justify-content: space-between;">
                	<h1 style="">{{ __('To-Do List') }}</h1>     
                	<a style="padding: 10px; padding-top: 12px; cursor: pointer; border: 1px solid orange; background-color: green; text-decoration: none; color: white; font-weight: bolder;" href="/todos/create">Create +</a>
                </div>
                <!--div class="card-body">
                	<a style="padding: 10px; cursor: pointer; border: 1px solid orange; background-color: green; text-decoration: none; color: white; font-weight: bolder;" href="/todos/create">Create New Entry</a>
                </div-->
                <div class="card-body">

                    <ol style="border: 1px dashed lightgrey; ">
						@forelse($todos as $todo)

							<li style="border: 1px dashed lightgrey; display:flex; justify-content: space-between; padding: 20px;">	
								@if($todo->completed)
								<div style="text-decoration: line-through;">

									<a href="{{route('todo.showlist', $todo->id)}}"><h3 style="color: #DEDEDE; font-family: sans-serif; ">{{$todo->title}}</h3></a>
			
								</div>
									
								@else
								<div>

									<a href="{{route('todo.showlist', $todo->id)}}"><h3 style="color: green; font-family: sans-serif; ">{{$todo->title}}</h3></a>
									
								</div>
								@endif
								<div style="display: flex; justify-content: space-between;">
									<a style="padding: 8px; cursor: pointer;  background-color: white; text-decoration: none; color: orange; font-weight: bolder;" href="{{'/todos/'. $todo->id .'/edit'}}"><span class="fas fa-pencil-alt fa-lg" / ></a>

									

									@if($todo->completed)
										<span onclick="event.preventDefault();document.getElementById('form-notcomplete-{{$todo->id}}').submit()" class="fas fa-check-circle fa-lg"  style="padding: 10px; color: green; cursor: pointer;" ></span>
											<form id="{{'form-notcomplete-'.$todo->id}}" hidden="True" method="post" action="{{route('todo.notcompleted', $todo->id)}}">
												@method('PATCH')
												@csrf
											</form>
									@else
										<span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" class="far fa-check-circle fa-lg" style="padding: 10px; cursor: pointer; color: #DEDEDE;" ></span>
											<form id="{{'form-complete-'.$todo->id}}" hidden="True" method="post" action="{{route('todo.completed', $todo->id)}}">
												@method('PATCH')
												@csrf
											</form>										
									@endif

									
									<span onclick="if(confirm('Are you sure you want to delete?')){document.getElementById('form-delete-{{$todo->id}}').submit()}else{ return 0;};" class="fas fa-times fa-lg"  style="padding: 10px; color: red; cursor: pointer;" ></span>
										<form id="{{'form-delete-'.$todo->id}}" hidden="True" method="post" action="{{route('todo.delete', $todo->id)}}">
											@method('PUT')
											@csrf
										</form>		

								</div>
								
							</li>
							@empty
							<h3 style="text-align: center; font-family: sans-serif; ">No Task Available, Create One !!</h3>
						@endforelse

					</ol>
                </div>
            
@endsection