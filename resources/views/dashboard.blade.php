@extends('layouts.template')

@section('content')
    @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1">Peserta Didik</div>
                </div>
            </div>
            <div class="text-xl font-medium">{{ $student }}</div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div>
                            <div class="text-2xl font-semibold mb-1">Admin</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-xl font-medium">{{ $admin }}</div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div>
                            <div class="text-2xl font-semibold mb-1">Pembimbing Siswa</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-xl font-medium">{{ $pembimbing }}</div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div>
                            <div class="text-2xl font-semibold mb-1">Rombel</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-xl font-medium">{{ $rombel }}</div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div>
                            <div class="text-2xl font-semibold mb-1">Rayon</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-xl font-medium">{{ $rayon }}</div>
        </div>
    </div>
@endsection
