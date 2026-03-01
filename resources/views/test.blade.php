
@extends('layouts.app')

@section('main')

<div class="h-screen w-full bg-gray-400 flex justify-center items-center">
 
    <div class="max-w-sm mx-auto p-8 bg-gray-100  rounded-xl shadow-md space-y-4">
        <img class="w-32 mx-auto rounded-full ring-4 ring-green-400" src="{{ asset('frontend/img/Fevicon.png') }}" alt="" >
        <div class="text-center space-y-3">
            <div>
                <p class="text-lg font-semibold">Mohaimenul Haque</p>
                <p class="text-sm">Full Stack Developer</p>
            </div>
            <button class="px-4 py-1 text-sm font-semibold border border-blue-900 rounded-full">More-></button>
        </div>
    </div>

</div>

@endsection