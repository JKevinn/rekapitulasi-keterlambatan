@extends('layouts.plain')

@section('error')
    <section class="flex items-center h-full p-16 dark:bg-gray-900 dark:text-gray-100">
        <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
            <div class="max-w-md text-center">
                <h2 class="mb-8 font-extrabold text-9xl dark:text-gray-600">
                    <span class="sr-only">Error</span>404
                </h2>
                <p class="mb-8 text-2xl font-semibold md:text-3xl">Sorry, we couldn't find this page.</p>
                @if (Auth::check())
                    @if (Auth::user()->role == 'Admin')
                        <a rel="noopener noreferrer" href="{{ route('dashboard') }}"
                            class="underline px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Back to
                            homepage</a>
                    @else
                        <a rel="noopener noreferrer" href="{{ route('dashboard-pembimbing') }}"
                            class="underline px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Back to
                            homepage</a>
                    @endif
                @else
                    <a rel="noopener noreferrer" href="{{ route('index') }}"
                        class="underline px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Back to
                        homepage</a>
                @endif
            </div>
        </div>
    </section>
@endsection
