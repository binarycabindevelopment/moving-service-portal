@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>Availability</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
                'Manage Availability' => url('/manage/availability'),
                'Edit Event' => url('/manage/availability/'.$availabilityEvent->id.'/edit'),
            ]
            ])
        </div>
    </div>

    <div>

        {!! Former::open('/manage/availability/'.$availabilityEvent->uuid)->method('PATCH') !!}
        {!! Former::populate($availabilityEvent) !!}
        @include('manage.availability.partials.fields')
        @component('components.buttons.submit')
            Save
        @endcomponent
        {!! Former::close() !!}

    </div>

@endsection