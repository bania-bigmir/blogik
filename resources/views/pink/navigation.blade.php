@if($menu)
    <div class="nav-wrap">
        <nav id="mainnav" class="mainnav">
            <ul class="menu">
                    @include(env('THEME').'.customMenuItems',['items'=>$menu->roots()])
                </ul>
        </nav>
        </div>


@endif







