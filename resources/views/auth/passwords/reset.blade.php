@extends('layouts.blank-side-graphic.app',[
    'graphic' => asset('/img/background-truck-1.png')
])

@section('content')

    <div class="border-b border-grey-light p-4 px-3 py-10 bg-grey-lighter flex justify-center flex-1">
        <div class="w-full max-w-xs self-center">
            <div class="mb-4 text-center">
                <a href="{{ url('/') }}"><img src="{{ asset('/img/logo.png') }}" /></a>
            </div>
            <h4 class="mb-4">Password Reset</h4>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4">
                {!! Former::open(route('password.request'))->method('POST') !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-4">
                    {!! Former::email('email','Email Address')->required() !!}
                    {!! Former::password('password','Password')->required() !!}
                    {!! Former::password('password_confirmation','Confirm Password')->required() !!}
                    @component('components.buttons.submit')
                        Reset Password
                    @endcomponent
                </div>
                {!! Former::close() !!}
            </div>
        </div>
    </div>

@endsection