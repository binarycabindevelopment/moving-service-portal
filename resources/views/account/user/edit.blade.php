@extends('layouts.dashboard.app')
@section('content')
    <div class="flex justify-between mb-8">
        <h1>My Account</h1>
        <div class="self-center">
            @include('components.breadcrumbs.breadcrumbs',[
            'links' => [
                'Dashboard' => url('/dashboard'),
                'My Account' => url('/account/user'),
            ]
            ])
        </div>
    </div>

    <div class="bg-white shadow">
        <div class="p-6">
            <h2 class="mb-4">Update Email Address or Password</h2>
            {!! Former::open('/account/user')->method('PATCH') !!}
            {!! Former::populate(\Auth::user()) !!}
            {!! Former::email('email','Email Address')->required() !!}
            {!! Former::password('password','New Password')->help('Leave blank to keep current password') !!}
            @component('components.buttons.submit')
                Save
            @endcomponent
            {!! Former::close() !!}
        </div>

    </div>

@endsection