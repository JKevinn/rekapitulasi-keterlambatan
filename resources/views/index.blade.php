@extends('layouts.template')

@section('content')
    <form action="{{ route('login.auth') }}" method="POST">
    @csrf
    @if (Session::get('failed'))
        <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
    @endif
    <div class="py-20 p-4 md:p-20 lg:p-32">
        <div class="rounded-lg overflow-hidden mx-auto">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back!</h2>
                <p class="text-gray-700 mb-6">Please Log in to your account</p>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
              </label>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2" for="password">
                Password
              </label>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit" id="submit">
                Submit
              </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection