@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>Rules</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
                'Manage Rules' => url('/manage/rule'),
            ]
            ])
        </div>
    </div>

    <rules-table data="{{ json_encode($rules) }}" csrf="{{ csrf_token() }}"></rules-table>

@endsection