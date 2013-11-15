<div class="form-group">
    {{ Form::label('name', 'Title') }}
    {{ Form::text('name', null ,array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('abbreviation', 'Abbreviation') }}
    {{ Form::text('abbreviation', null ,array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('short_name', 'Short Name') }}
    {{ Form::text('short_name', null ,array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('is_tournament', 'Is Tournament') }}
    {{ Form::checkbox('is_tournament') }}
</div>

<div class="form-group">
    {{ Form::label('sport_id', 'Sport') }}
    {{ Form::select('sport_id', $sports) }}
</div>

<div class="form-group">
    {{ Form::label('country_id', 'Country') }}
    {{ Form::select('country_id', $countries) }}
</div>