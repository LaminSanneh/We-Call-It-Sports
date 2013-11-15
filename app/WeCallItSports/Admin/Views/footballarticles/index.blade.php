@extends('layouts.admin_master')

@section('content')
	<p>{{ link_to_route('admin.football.articles.create', 'Add New Article') }}</p>
	<p>{{ link_to_route('admin.football.deleted_articles', 'View Deleted Articles') }}</p>

	<table class="table">
        <tr>
        <th>Title</th><th>Summary</th><th>Sport</th><th>Tournament</th><th></th>
        </tr>
        @foreach($articles as $article)
            <tr>
                <td>{{link_to_route('admin.football.articles.edit', $article->title, $article->id)}}</td>
                <td>{{$article->summary}}</td>
                <td>Sport Here</td>
                <td>Tournament Here</td>
                <td class="delete-link">
                    {{Form::model($article, array('route' => array('admin.football.articles.destroy', $article->id), 'method' => 'DELETE'))}}
                        {{Form::submit('Delete', array('class' => 'btn btn-warning'))}}
                    {{Form::close()}}</td>
            </tr>
        @endforeach
	</table>
@stop