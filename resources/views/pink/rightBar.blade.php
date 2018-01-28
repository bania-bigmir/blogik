
<!-- Recent posts -->
@if($articles)
    <h5 class="widget-title">Останні пости</h5>
    <ul class="popular-news clearfix">
        @foreach($articles as $article)
            <li>
            @if($article->img)
                    <div class="thumb">
                <img src="{{asset(env('THEME'))}}/images/articles/{{$article->img->mini}}" class="img-rounded"
                     alt="{{$article->img->mini}}" title="{{$article->img->mini}}"/>
                    </div>
            @endif
                <div class="text">

            <h6><a href="{{route('articles.show',['alias' =>$article->alias])}}" >{{ $article->title }}</a></h6>
                    <a class="post_meta">{{$article->created_at->format('d-m-Y')}}</a>

                </div>
            </li>
        @endforeach
    </ul>
@endif