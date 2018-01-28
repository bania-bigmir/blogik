@foreach($items as $item)
    @if(!$item->hasChildren())
        <li>
            <a href="{{ url($item->url()) }}">{{ $item->title }}</a>
        </li>
    @endif
    @if($item->hasChildren())
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $item->title }} </a>
            <ul class="submenu right-sub-menu">
                @include(env('THEME').'.customMenuItems',['items'=>$item->children()])

            </ul>
    @endif

@endforeach