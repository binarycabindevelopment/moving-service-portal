@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>Availability</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
                'Manage Availability' => url('/manage/availability'),
                'New Event' => url('/manage/availability/create'),
            ]
            ])
        </div>
    </div>

    <div>

        {!! Former::open('/manage/availability')->method('POST') !!}
        {!! Former::populate($defaultValues) !!}
        @include('manage.availability.partials.fields')
        @component('components.buttons.submit')
            Save
        @endcomponent
        {!! Former::close() !!}

    </div>

@endsection