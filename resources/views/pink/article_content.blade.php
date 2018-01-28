@if($article)
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
                        {{$article->created_at->format('F')}}
                    </li>
                </ul><!-- /.post-comment -->
            </div><!-- /.feature-post -->
            <div class="content-post">
                <h1 class="title-post"><a href="#">{!! $article->title !!}</a></h1>
                <ul class="meta-post clearfix">
                    <li class="author"><a href="#">By {{ $article->user->name}}</a>
                    </li>
                    <li class="categories">
                        <a href="{{ route('articlesCat',['cat_alias'=> $article->category->alias]) }}"
                           title="Всі пости у розділі {{ $article->category->title }}">{{ $article->category->title }}</a>
                    </li>
                    <li class="vote">
                        <a href="{{ route('articles.show',['alias'=>$article->alias]) }}#respond" onclick=slowScroll()>{{count($article->comments) ? count($article->comments) : '0' }} {{ Lang::choice('uk.comments',count($article->comments)) }}</a>
                    </li>
                </ul><!-- /.meta-post -->
                <div class="entry excerpt">

                    {!! $article->text !!}
                </div>

                <div class="direction">
                    <ul>
                        <li>
                            <div class="black-button">

                                <a href="{{ isset($prevPostAlias) ? route('articles.show',['alias'=>$prevPostAlias->alias]) : '#' }}"
                                   rel="prev">Попередній Пост</a>
                            </div>
                        </li>
                        <li>
                            <div class="accent-button">
                                <a href="{{ isset($nextPostAlias) ? route('articles.show',['alias'=>$nextPostAlias->alias]) : '#' }}"
                                   rel="next">Наступний Пост</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- /.content-post -->
        </article>

        <div class="main-single">

            <div class="comments-area">
                <h2 class="comments-title">
                    <span>{{ count($article->comments) }} </span>{{ Lang::choice('uk.comments',count($article->comments)) }}
                </h2>
                @if(count($article->comments) > 0)

                    @php
                        $com = $article->comments->groupBy('parent_id');
                    @endphp

                    <ol class="comment-list">
                        @foreach($com as $k => $comments)
                            @if($k!=0)
                                @break
                            @endif
                            @include(env('THEME').'.comment',['items' =>$comments])
                        @endforeach

                    </ol><!-- .comment-list -->
                @endif
                <div class="comment-respond" id="respond">
                    <h2 class="comment-reply-title">Залиште коментар <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h2>
                    <form novalidate="" class="comment-form" id="commentform" method="post" action="{{route('comment.store')}}">
                        @if(!Auth::check())
                            <p class="comment-notes">
                                <input type="text" placeholder="Ваше Ім'я" aria-required="true" size="30" value=""
                                       name="name" id="name">
                            </p>
                            <p class="comment-form-email">
                                <input type="email" placeholder="Email" size="30" value="" name="email"
                                       id="email">
                            </p>
                        @endif
                        <p class="comment-form-comment">
                            <textarea class="" tabindex="4" placeholder="Коментар" name="text" required></textarea>
                        </p>
                        <p class="form-submit">
                            {{ csrf_field() }}
                            <input id="comment_post_ID" type="hidden" name="comment_post_ID"
                                   value="{{ $article->id }}"/>
                            <input id="comment_parent" type="hidden" name="comment_parent" value="0"/>
                            <button id="submit" class="comment-submit">Post comment</button>
                        </p>
                    </form>
                </div><!-- /.comment-respond -->
            </div><!-- /.comments-area -->
        </div>
        @endif
    </div><!-- /.post-wrap -->
