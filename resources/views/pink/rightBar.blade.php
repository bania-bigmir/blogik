@if($articles)
    <div class="well">
        <h3>Останні пости</h3>
        @foreach($articles as $article)
            <h4>{{$article->title}}</h4>
            @if($article->img)
                <img src="{{asset(env('THEME'))}}/images/articles/{{$article->img->mini}}" class="img-rounded"
                     alt="{{$article->img->mini}}" title="{{$article->img->mini}}"/>
            @endif
            <p>{{$article->created_at->format('d-m-Y')}}</p>
            <a href="{{route('articles.show',['alias' =>$article->alias])}}" class="btn btn-default">Читати
                більше...</a>
        @endforeach

    </div>
@endif