<!-- {{ Form::open(array('route' => 'uploadArticleImage', 'files' => true, 'class' => 'dropzone', 'id' => 'my-awesome-dropzone')) }}
		{{ Form::label('competition_id', 'Upload Featured Image') }}
		{{ Form::file('file') }}
		{{ Form::text('article_id', $article->id, array('hidden' => true))}}
{{ Form::close() }} -->

<form action="{{ route('uploadArticleImage')}}" class="dropzone" id="my-awesome-dropzone">
	{{ Form::text('article_id', $article->id, array('hidden' => true))}}
</form>