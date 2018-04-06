@if($gallery)
    <h2>{{$gallery->name}}</h2>
    <p>{{$gallery->description}}</p>
    <div id="slider" class="flexslider">
        <ul class="slides">
            
    @foreach($gallery->photos as $photo)

        

            <li data-thumb="{{asset($photo)}}">
                    <img src="{{asset($photo)}}"/>

            </li>

        @
    @endforeach
        </ul>
    </div>
    <div id="carousel" class="flexslider">
    <ul class="slides">
    @foreach($gallery->photos as $photo)

        

            <li data-thumb="{{asset($photo)}}">
                <img src="{{asset($photo)}}" alt="{{ $photo }}"/>

            </li>

       
    @endforeach
    </ul>
    </div>
@endif




