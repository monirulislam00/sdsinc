@extends('frontend.master')
@section('home_content')
    <div class="container block mt-5">
        <p class="bg-warning text-center">
            {{ $data['service_id'] }}
            {{ $data['quality'] }}
        </p>
    </div>
@endsection
