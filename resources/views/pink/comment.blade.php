@foreach($items as $item)

    <li  class="comment {{$item->parent_id==0 ? '' : 'byuser comment-author-admin bypostauthor odd alt depth-2 parent'}}">
        <article id="comment-{{$item->id}}" class="comment-body">
            <div class="comment-author">
                @php
                    $hash = isset($item->email) ? md5($item->email) : md5($item->user->email);
                @endphp
                <img src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=75" alt="image">
            </div><!-- .comment-author -->
            <div class="comment-text">
                <div class="comment-metadata">
                    <h5><a href="#">{{ $item->user->name or $item->name }}</a></h5>
                    <span class="date">{{ is_object($item->created_at) ? ($item->created_at->format('d').' '.Lang::get('month.'.$item->created_at->format('m')).$item->created_at->format(', Y у H:i')) : ''}}</span>
                </div><!-- .comment-metadata -->
                <div class="comment-content">
                    {{ $item->text }}
                </div><!-- .comment-content -->

                <div class="reply">
                    <a href="#respond" class="comment-reply-link"
                       onclick="return addComment.moveForm(&quot;comment-{{ $item->id }}&quot;,&quot;{{ $item->id }}&quot;,&quot;respond&quot;,&quot;{{$item->article_id}}&quot;)">Reply<i
                                class="fa fa-reply-all"></i></a>
                </div>
            </div><!-- /.comment-text -->
        </article><!-- .comment-body -->
        @if(isset($com[$item->id]))
            <ol class="children">
                @include(env('THEME').'.comment',['items'=>$com[$item->id]])
            </ol><!-- .children -->
        @endif
    </li><!-- #comment-## -->
@endforeach