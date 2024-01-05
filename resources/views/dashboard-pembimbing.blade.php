@extends('layouts.template')

@section('content')
    @if (Session::get('failed'))
        <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1">Peserta Didik Rayon {{ $rayon }}</div>
                </div>
            </div>
            <div class="text-xl font-medium">{{ $students->count() }}</div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div>
                            <div class="text-2xl font-semibold mb-1">Keterlambatan {{ $rayon }} Hari Ini</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-xl font-medium">{{ $studentlate }}</div>
        </div>
    </div>
@endsection
