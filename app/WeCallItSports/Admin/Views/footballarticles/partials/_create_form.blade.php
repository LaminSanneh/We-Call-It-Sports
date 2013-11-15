{{ Form::model($article, array('route' =>  'admin.football.articles.store')) }}
	
	@include ('footballarticles.partials._form_body')

	<div>
		{{ Form::submit('Create Article', array('class' => 'btn btn-default')) }}
	</div>

{{ Form::close() }}