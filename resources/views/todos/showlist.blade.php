@extends('todos.layout')

@section('content1')
				<div class="card-header" style="display: flex; justify-content: space-between;">
                	<h1 style="text-align: left;">{{$todo->title}}</h1> 
                	<a style="padding: 10px; padding-top: 12px; padding-right: 20px; cursor: pointer; text-decoration: none; color: #686868; font-weight: bolder;" href="{{route('todo.home')}}"><span class="fas fa-arrow-left fa-lg"></span></a>
                </div>
				
				
                <div class="card-body">
                	<div>

						<h3 style="color: green; font-family: sans-serif; ">{{$todo->description}}</h3>

					</div>
                  
                </div>

                

                @if($todo->steps->count() > 0)

                <h2 style="text-align: center; padding-top: 10px;" >Steps :</h2>
                <div class="card-body">

                	@foreach($todo->steps as $step)
                	<ul>
                		<li><h3 style="color: green; font-family: sans-serif; ">{{$step->name}}</h3></li>
                	</ul>
                	@endforeach

					
                </div>
                @endif



@endsection
