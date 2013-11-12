<aside class="module-articles-group-secondary columns">
    <h2>Popular Stories</h2>
    @foreach($latest_popular_articles as $latest_popular_article)
        <article class="module-article-summary">
            <a href="{{route('footballArticle', array('id' => $latest_popular_article->id, 'title' => $latest_popular_article->title))}}">{{ HTML::image('images/suarez.jpg') }}</a>
            <h3 class="h4"><a href="{{route('footballArticle', array('id' => $latest_popular_article->id, 'title' => $latest_popular_article->title))}}">{{ $latest_popular_article->title }}</a></h3>
        </article>
    @endforeach
</aside>
