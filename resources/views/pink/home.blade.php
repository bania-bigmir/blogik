@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @elseif(Session::has('status') )
    <div class="alert alert-success">
        <strong> {{session('status') }}</strong>
    </div>
@endif

@if ($content)
<h1 class="blog-post-title">{{$content->title}}</h1>
<div class="blog-post">

{!!$content->text!!}

</div>
@endif






