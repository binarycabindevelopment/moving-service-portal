@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>Availability</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
                'Manage Availability' => url('/manage/availability'),
            ]
            ])
        </div>
    </div>

    {!! $calendar->calendar() !!}

@endsection

@section('scripts')
    {!! $calendar->script() !!}
@endsection