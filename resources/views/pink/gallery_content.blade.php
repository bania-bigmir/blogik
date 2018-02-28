@if($gallery)
    <h2>{{$gallery->name}}</h2>
    <p>{{$gallery->description}}</p>
    <div id="slider" class="flexslider">
        <ul class="slides">
    @foreach($gallery->photo as $photo)

        @if($photo->active)

            <li data-thumb="{{asset('images/galleries')}}/{{$gallery->alias}}/{{$photo->url}}">
                    <img src="{{asset('images/galleries')}}/{{$gallery->alias}}/{{$photo->url}}" alt="{{ $photo->name }}"/>

            </li>

        @endif
    @endforeach
        </ul>
    </div>
    <div id="carousel" class="flexslider">
    <ul class="slides">
    @foreach($gallery->photo as $photo)

        @if($photo->active)

            <li data-thumb="{{asset('images/galleries')}}/{{$gallery->alias}}/{{$photo->url}}">
                <img src="{{asset('images/galleries')}}/{{$gallery->alias}}/{{$photo->url}}" alt="{{ $photo->name }}"/>

            </li>

        @endif
    @endforeach
    </ul>
    </div>
@endif




