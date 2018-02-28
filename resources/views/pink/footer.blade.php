<div class="row">


    <div class="col-md-6">
        <div class="widget widget-services clearfix">
            <h5 class="widget-title">Швидкі посилання</h5>

            @foreach ($menu->items as $item)

                @if ( $loop->first)

                    <ul class="one-half">
                        <li><a href="{{route('home') }}">{{$item->title}}</a></li>
                        @elseif($item->link->path['url'] ==='#' or $item->link->path['url'] === '' )
                            @continue
                        @elseif (  !$loop->first and $loop->index < $loop->count/2+1)
                            <li><a href="{{ url($item->link->path['url']) }}">{{$item->title}}</a></li>
                        @elseif ( !$loop->last and  $loop->index > $loop->count/2+1)
                    </ul>
                    <ul class="one-half">
                        <li><a href="{{ url($item->link->path['url']) }}">{{$item->title}}</a></li>
                        @elseif ($loop->last)
                            <li><a href="{{ url($item->link->path['url']) }}">{{$item->title}}</a></li>
                    </ul>
                @endif
            @endforeach
           

        </div>
    </div>

    <div class="col-md-6">
        <div class="widget widget-newsletter">
            <h5 class="widget-title">Зв'язатись зі мною</h5>
            <a class="email" href="#">Email@yourcompany.com</a>
            <a href="#"></a>
            <div class="more-link">
                <a href="{{route('home').'#feedback' }}">Форма зворотнього зв'язку</a>
            </div>
        </div><!-- /.widget-newsletter -->
    </div>

</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>© Copyright <a href="#">Themesflat</a> 2017. All Rights Reserved.
            </p>
        </div>
    </div>
</div>
