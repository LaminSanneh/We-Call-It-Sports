{{ Form::model($article, array('route' => array('admin.football.articles.update', $article->id), 'method' => 'PATCH')) }}

@include ('footballarticles.partials._form_body')

<div>
    {{ Form::submit('Update Article', array('class' => 'btn btn-default')) }}
</div>
{{ Form::close() }}
<div>
    @foreach($article->images as $image)
    <span>
        <img style="width:200px; height:auto;" src="{{asset($image->url)}}" alt=""/>
        {{Form::model($image, array('route' => array('admin.images.delete_article_image', $image->id)))}}
            {{Form::submit('Delete', array('class' => 'btn btn-warning'))}}
        {{Form::close()}}
    </span>
    @endforeach
</div>
@include('footballarticles.partials._image_upload_form')