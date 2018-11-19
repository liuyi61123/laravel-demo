@extends('layouts.app')

@section('content')

@endsection

@section('scripts')
    <script>
        Echo.channel('channel-test')
            .listen('OrderShipped', (e) => {
                console.log(e);
            });
    </script>
@endsection
