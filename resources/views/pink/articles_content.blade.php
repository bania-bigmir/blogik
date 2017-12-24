@if($articles)

        @foreach($articles as $article)
            <h2>{{$article->title}}</h2>
            @if($article->img)
                <img src="{{asset(env('THEME'))}}/images/articles/{{$article->img->mini}}" class="img-rounded"
                     alt="{{$article->img->mini}}" title="{{$article->img->mini}}"/>
            @endif
            <article>{{$article->desc}}</article>
            <p>{{$article->created_at->format('d-m-Y')}}</p>
            <p>{{$article->created_at->format('d-m-Y')}}</p>
            <a href="{{route('articles.show',['alias' =>$article->alias])}}" class="btn btn-default">Читати
                більше...</a>
        @endforeach


@endif
