@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>Edit Rule</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
                'Manage Rules' => url('/manage/rule'),
                'Edit Rule' => url('/manage/rule/'.$rule->uuid.'/edit'),
                'Locations' => url('/manage/rule/'.$rule->uuid.'/location'),
            ]
            ])
        </div>
    </div>

    @include('manage.rule.partials.tabs')

    <div class="pt-4">
        <locations-table data="{{ json_encode($locations) }}" csrf="{{ csrf_token() }}" :rule="{{ $rule }}"></locations-table>
    </div>



@endsection