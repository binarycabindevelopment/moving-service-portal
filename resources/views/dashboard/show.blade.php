@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>Dashboard</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
            ]
            ])
        </div>
    </div>

    <div class="bg-white shadow">
        <div class="p-6">
            <h2 class="mb-4">Panel</h2>
            Panel Component
        </div>

    </div>

@endsection