<div class="post-wrap">
    @if($galleries)
        @foreach($galleries as $key => $gallery)


            @if($gallery->active)
                <div class="flat-team list  has-image">
                    <div class="team-image">
                        <img src="{{ asset($photos[$key][0]) }}"
                             alt="{{ $gallery->name }}" style="width:275px;height: 242px">
                    </div>

                    <div class="team-info">
                        <div class="team-subtitle">{{ $gallery->created_at->format('d')}}&nbsp;{{ Lang::get('month.'.$gallery->created_at->format('m')) }}&nbsp;{{ $gallery->created_at->format('Y') }}</div>
                        <h3 class="team-name">{{ $gallery->name }}</h3>
                        <div class="team-desc">{{ $gallery->description }}</div>


                        @foreach($gallery->filters  as  $filter)

                            <a href="{{url('galereja/filter/'.$filter['name']) }}">{{ $filter['name'] }}</a>&nbsp;
                        @endforeach


                        <p class="box-readmore">
                            <a href="{{ route('galereja.show',['alias'=>$gallery->alias]) }}">Дивитись галерею</a>
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

        <div class="blog-pagination">
            @if($galleries->lastPage() > 1)
                <ul class="flat-pagination clearfix">
                    @if($galleries->currentPage() !== 1 )
                        <li class="prev">
                        @if($galleries->currentPage() == 2)
                                <a href="{{ str_replace('?page=2','',URL::current()) }}"><i
                                            class="fa fa-angle-left fa-4x"></i></a>
                        @else
                            <a href="{{ $galleries->url($galleries->currentPage() - 1) }}"><i
                                        class="fa fa-angle-left fa-4x"></i></a>
                        </li>
                        @endif
                    @endif
                    @for($i = 1; $i <= $galleries->lastPage();$i++)
                        @if($galleries->currentPage() == $i)
                            <li class="active disabled">{{ $i }}</li>
                        @else
                            @if($i==1)
                            <li><a href="{{ str_replace('?page=2','',URL::current())}}">{{$i}}</a></li>
                                @else
                                    <li><a href="{{ $galleries->url($i) }}">{{$i}}</a></li>
                                @endif
                        @endif
                    @endfor
                    @if($galleries->currentPage() !== $galleries->lastPage())
                        <li class="next">
                            <a href="{{ $galleries->url($galleries->currentPage()+1) }}"><i class="fa fa-angle-right fa-4x"></i></a>
                        </li>
                    @endif
                </ul><!-- /.flat-pagination -->
            @endif
        </div><!-- /.blog-pagination -->
</div>
