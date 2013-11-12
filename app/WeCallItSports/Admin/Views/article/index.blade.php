@extends('layouts.admin_master')

@section('content')
	<p>{{ link_to_route('admin.articles.create', 'Add New Article') }}</p>

	<table class="table">
	  <tr>
	  	<th>Title</th><th>Summary</th><th>Sport</th><th>Tournament</th>
	  </tr>
	  @foreach($articles as $article)
		  <tr>
	  		<td>{{link_to_route('admin.articles.edit', $article->title, $article->id)}}</td>
	  		<td>{{$article->summary}}</td>
	  		<td>Sport Here</td>
	  		<td>Tournament Here</td>
		  </tr>
	  @endforeach
	</table>
@stop