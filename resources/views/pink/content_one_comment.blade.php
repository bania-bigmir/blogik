<li  class="comment {{ ($data['parent_id']==0) ? '' : 'byuser comment-author-admin bypostauthor odd alt depth-2 parent'}}">
    <article id="comment-{{$data['id']}}" class="comment-body">
        <div class="comment-author">
            <img src="https://www.gravatar.com/avatar/{{$data['hash']}}?d=mm&s=75" alt="image">
        </div><!-- .comment-author -->
        <div class="comment-text">
            <div class="comment-metadata">
                <h5><a href="#">{{ $data['name'] }}</a></h5>
                <span class="date">Щойно додано</span>
            </div><!-- .comment-metadata -->
            <div class="comment-content">
                {{ $data['text'] }}
            </div><!-- .comment-content -->
        </div><!-- /.comment-text -->
    </article><!-- .comment-body -->
</li><!-- #comment-## -->
