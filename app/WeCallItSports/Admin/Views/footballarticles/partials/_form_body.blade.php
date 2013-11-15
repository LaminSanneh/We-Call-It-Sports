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
    {{ Form::text('sport_id', $sport_id, array('hidden' => true)) }}
</div>

<div class="form-group">
    {{ Form::label('competition_id', 'Competition') }}
    {{ Form::select('competition_id', $competitions) }}
</div>

<div class="form-group">
    {{ Form::label('status_id', 'Status') }}
    {{ Form::select('status_id', $status_ids) }}
</div>