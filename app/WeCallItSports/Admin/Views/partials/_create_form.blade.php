{{ Form::model($article, array('route' => 'admin.articles.store')) }}
	
	@include ('partials._form_body')

	<div>
		{{ Form::submit('Create Article', array('class' => 'btn btn-default')) }}
	</div>

{{ Form::close() }}