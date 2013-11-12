<div class="form-group">
	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', null ,array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('summary', 'Summary') }}
	{{ Form::textarea('summary', null ,array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('text', 'Text') }}
	{{ Form::textarea('text', null ,array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('sport_id', 'Sport') }}
	{{ Form::select('sport_id', $sports) }}
</div>

<div class="form-group">
	{{ Form::label('competition_id', 'Competition') }}
	<select data-bind="foreach: listOfcompetitions" id="competition_id" name="competition_id">
		<option data-bind="text:name, value:id"></option>
	</select>
</div>