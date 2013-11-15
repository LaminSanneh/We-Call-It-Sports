@extends('layouts.admin_master')

@section('content')
<p>{{ link_to_route('admin.football.competitions.create', 'Add New Article') }}</p>

<table class="table">
    <tr>
        <th>Title</th><th>Sport</th><th>Country</th><th></th>
    </tr>
    @foreach($competitions as $competition)
    <tr>
        <td>{{link_to_route('admin.football.competitions.edit', $competition->name, $competition->id)}}</td>
        <td>{{$competition->sport->local_name}}</td>
        <td>{{$competition->country->name}}</td>
        <td class="delete-link">{{link_to_route('admin.football.competition.destroy', 'Delete' ,$competition->id)}}</td>
    </tr>
    @endforeach
</table>
@stop