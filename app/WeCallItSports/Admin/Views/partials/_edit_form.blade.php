{{ Form::model($article, array('route' => array('admin.articles.update', $article->id), 'method' => 'PATCH')) }}
	
	@include ('partials._form_body')

	<div>
		{{ Form::submit('Update Article', array('class' => 'btn btn-default')) }}
	</div>

{{ Form::close() }}
@include('partials._image_upload_form')