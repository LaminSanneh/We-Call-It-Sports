@extends ('layouts.master')
@section('content')
        
    <section class="module-articles-group-primary columns">
        <h2>Latest Stories</h2>
        @foreach($latest_football_articles as $latest_football_article)
	        <article class="module-article-summary grid-4">
	            <a href="{{route('footballArticle', array('id' => $latest_football_article->id, 'title' => $latest_football_article->title))}}">{{ HTML::image('images/hernandez.jpg') }}</a>
	            <a href="{{route('footballArticle', array('id' => $latest_football_article->id, 'title' => $latest_football_article->title))}}"><h3 class="h4">{{ $latest_football_article->title }}</h3></a>
	        </article>
    	@endforeach
    </section>

    <section class="module-articles-group-primary columns">
        <h2>Premier League</h2>
        @foreach($latest_premier_league_articles as $latest_premier_league_article)
	        <article class="module-article-summary grid-4">
	            <a href="{{route('footballArticle', array('id' => $latest_premier_league_article->id, 'title' => $latest_premier_league_article->title))}}">{{ HTML::image('images/suarez.jpg') }}</a>
	            <a href="{{route('footballArticle', array('id' => $latest_premier_league_article->id, 'title' => $latest_premier_league_article->title))}}"><h3 class="h4">{{ $latest_premier_league_article->title }}</h3></a>
	        </article>
        @endforeach
    </section>

    <section class="module-articles-group-primary columns">
        <h2>La Liga</h2>
        @foreach($latest_la_liga_articles as $latest_la_liga_article)
	        <article class="module-article-summary grid-4">
	            <a href="{{route('footballArticle', array('id' => $latest_la_liga_article->id, 'title' => $latest_la_liga_article->title))}}">{{ HTML::image('images/begovic.jpg') }}</a>
	            <a href="{{route('footballArticle', array('id' => $latest_la_liga_article->id, 'title' => $latest_la_liga_article->title))}}"><h3 class="h4">{{ $latest_la_liga_article->title }}</h3></a>
	        </article>
        @endforeach
    </section>

    <section class="module-articles-group-primary columns">
        <h2>Serie A</h2>
        @foreach($latest_serie_a_articles as $latest_serie_a_article)
	        <article class="module-article-summary grid-4">
	            <a href="{{route('footballArticle', array('id' => $latest_serie_a_article->id, 'title' => $latest_serie_a_article->title))}}">{{ HTML::image('images/begovic.jpg') }}</a>
	            <a href="{{route('footballArticle', array('id' => $latest_serie_a_article->id, 'title' => $latest_serie_a_article->title))}}"><h3 class="h4">{{ $latest_serie_a_article->title }}</h3></a>
	        </article>
        @endforeach
    </section>

    <section class="module-articles-group-primary columns">
        <h2>Bundesliga</h2>
        @foreach($latest_bundesliga_articles as $latest_bundesliga_article)
	        <article class="module-article-summary grid-4">
	            <a href="{{route('footballArticle', array('id' => $latest_bundesliga_article->id, 'title' => $latest_bundesliga_article->title))}}">{{ HTML::image('images/begovic.jpg') }}</a>
	            <a href="{{route('footballArticle', array('id' => $latest_bundesliga_article->id, 'title' => $latest_bundesliga_article->title))}}"><h3 class="h4">{{ $latest_bundesliga_article->title }}</h3></a>
	        </article>
        @endforeach
    </section>
        
@stop