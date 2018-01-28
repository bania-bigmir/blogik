@extends(env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection
@section('content')
{!! $content !!}
@endsection

@section('sidebar')

    {!! $contentRightBar !!}
@endsection

@section('footer')

    {!! $footer !!}
@endsection
