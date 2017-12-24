@extends(env('THEME').'.layouts.site')

@section('navigation')
{!! $navigation !!}
@endsection
@section('content')
    {!! $contentIndexPage !!}
@endsection

@section('sidebar')

    {!! $contentRightBar !!}
@endsection







