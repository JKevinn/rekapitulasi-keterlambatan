@extends('layouts.plain')

@section('login')
        <main class="flex flex-col items-center justify-center w-screen h-screen bg-gray-200 text-gray-700">
            <form class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" action="{{ route('login.auth') }}" method="POST">
                @csrf
                @if (Session::get('failed'))
                    <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
                @endif
                <h1 class="font-bold text-2xl mb-6">Rekapitulasi Keterlambatan Web App</h1>
                <label class="font-semibold text-xs" for="usernameField">Email</label>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input class="flex items-center h-12 px-4 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text" name="email" id="email">
                <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input class="flex items-center h-12 px-4 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2"type="password" name="password" id="password">
                <button class="flex items-center justify-center h-12 px-6 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700" type="submit">Login</button>
            </form>
            <!-- Component End  -->
        </main>
@endsection