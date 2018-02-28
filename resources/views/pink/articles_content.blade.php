@if($articles)
    @foreach($articles as $article)
        <div class="post-wrap">
            <article class="post clearfix">
                <div class="featured-post">
                    @if($article->img)
                        <img src="{{asset(env('THEME'))}}/images/articles/{{$article->img->max}}"
                             alt="{{$article->img->mini}}" title="{{$article->title}}"/>
                    @endif
                    <ul class="post-comment">
                        <li class="date">
                            <span class="day">{{$article->created_at->format('d')}}</span>
                        </li>
                        <li class="comment">
                            {{Lang::get('month.'.$article->created_at->format('m'))}}
                        </li>
                    </ul><!-- /.post-comment -->
                </div><!-- /.feature-post -->
                <div class="content-post">
                    <h2 class="title-post"><a
                                href="{{ route('articles.show',['alias'=>$article->alias]) }}">{!! $article->title !!}</a>
                    </h2>

                    <ul class="meta-post clearfix">
                        <li class="author"><a href="#">By {{ $article->user->name}}</a>
                        </li>
                        <li class="categories">
                            <a href="{{ route('articlesCat',['cat_alias'=> $article->category->alias]) }}"
                               title="Всі пости у розділі {{ $article->category->title }}">{{ $article->category->title }}</a>
                        </li>
                        <li class="vote">
                            <a href="{{ route('articles.show',['alias'=>$article->alias]) }}#respond" >{{count($article->comments) ? count($article->comments) : '0' }} {{ Lang::choice('uk.comments',count($article->comments)) }}</a>
                        </li>
                    </ul><!-- /.meta-post -->
                    <div class="entry-post excerpt">
                        {!! $article->desc !!}
                        <div class="more-link">
                            <a href="{{route('articles.show',['alias' =>$article->alias])}}">Читати більше...</a>
                        </div>
                    </div>
                </div><!-- /.content-post -->
            </article>
        </div>
    @endforeach

    <div class="blog-pagination">
        @if($articles->lastPage() > 1)
            <ul class="flat-pagination clearfix">
                @if($articles->currentPage() !== 1 )
                    <li class="prev">
                        @if($articles->currentPage() == 2)
                            <a href="{{route('articlesCat',['cat_alias'=> $articles[0]->category->alias])}}"><i
                                        class="fa fa-angle-left fa-4x"></i></a>
                    </li>
                @else
                    <a href="{{ $articles->url($articles->currentPage() - 1) }}"><i
                                class="fa fa-angle-left fa-4x"></i></a>
                    </li>
                @endif

                @endif
                @for($i = 1; $i <= $articles->lastPage();$i++)
                    @if($articles->currentPage() == $i)
                        <li class="active disabled">{{ $i }}</li>
                    @else
                        @if($i==1)
                            <li>
                                <a href="{{ route('articlesCat',['cat_alias'=> $articles[0]->category->alias]) }}">{{$i}}</a>
                            </li>
                        @else
                            <li><a href="{{ $articles->url($i) }}">{{$i}}</a></li>
                        @endif
                    @endif
                @endfor
                @if($articles->currentPage() !== $articles->lastPage())
                    <li class="next">
                        <a href="{{ $articles->url($articles->currentPage()+1) }}"><i
                                    class="fa fa-angle-right fa-4x"></i></a>
                    </li>
                @endif
            </ul><!-- /.flat-pagination -->

        @endif


    </div><!-- /.blog-pagination -->

@else
    {!!  Lang::get('uk.articles_no') !!}

@endif
