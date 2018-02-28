@extends(env('THEME').'.layouts.site')

@section('navigation')
{!! $navigation !!}
@endsection

@section('content')

<div class="error-template">
                <h1>
                    ПОМИЛКА 404</h1>
                <h2>
                    Вибачте! Такої сторінки не знайдено</h2>
                <div class="error-details">
                    Такої сторінки не існує на сервері. Можливо, ця сторінка видалена, перейменована або тимчасово недоступна.
                </div>
                <div class="error-actions">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        На Головну </a><a href="{{ route('home') }}#contactform" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Зв'язатися зі мною </a>
                </div>
    <div><img src="{{ asset('images/404/404.png') }}"/></div>
</div>
@endsection

@section('footer')
{!! $footer !!}
@endsection