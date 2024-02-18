@extends('./layouts/layout')

@section('content')
    @foreach ($array as $item)
        <x-h2 :array="$item" />
        <br>
    @endforeach
@endsection
