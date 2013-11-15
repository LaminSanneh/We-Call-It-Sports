{{ Form::model($competition, array('route' => array('admin.football.competitions.update', $competition->id), 'method' => 'PATCH')) }}

@include ('footballcompetitions.partials._form_body')

<div>
    {{ Form::submit('Update Competition', array('class' => 'btn btn-default')) }}
</div>

{{ Form::close() }}