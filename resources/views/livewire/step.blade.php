<div>

    <div class="form-group row">

		<h4 style="text-align: center; padding-top: 15px; padding-bottom: 15px; margin: 0 auto;">
			<b>Add Steps  </b>
			<button type="button" wire:click="increment" style="background-color: white; border: none;"><span class="fa fa-plus fa-sm" style="cursor: pointer;"></span></button>
		</h4>

		@foreach($steps as $step)

		<div style="display: flex;justify-content: center; width: 100%;" wire:key="{{$step}}">

			<input type="text" name="step[]" style="width: 100%;  margin-top: 5px; margin-bottom: 5px;" required="true" placeholder="{{'step '.($step + 1)}}">
			<button type="button" wire:click="remove({{$loop->index}})" style="background-color: white; border: none;"><span class="fas fa-times fa-lg"  style="padding: 10px; color: red; cursor: pointer;" ></span></button>

		</div>
		
		@endforeach
	</div>

</div>
