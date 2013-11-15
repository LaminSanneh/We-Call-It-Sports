<form action="{{ route('admin.images.upload_article_image')}}" class="dropzone" id="my-awesome-dropzone">
	{{ Form::text('article_id', $article->id, array('hidden' => true))}}
</form>