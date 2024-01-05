@extends('layouts.template')

@section('content')
<h2 class="font-medium text-3xl mt-16 mb-4 ms-2">{{ $student->name }} <span class="text-xl text-gray-500">| {{ $student->nis }} | {{ $student->rombel->rombel }} | {{ $student->rayon->rayon }}</span></h2>
<div class="grid w-full gap-6 md:grid-cols-3">
    @php
        $count = 1;
    @endphp
    @foreach ($late as $item)
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="align-item-center mt-4 mx-auto max-h-xs max-w-xs" src="{{ asset('storage/' . $item['bukti']) }}" alt="" />
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Keterlambatan Ke-{{ $count }}</h5>
            </a>
            <p class="m-3 font-normal text-gray-700 dark:text-gray-400">{{ $item['date_time_late'] }}</p>
            <p class="m-3 font-normal text-gray-700 dark:text-gray-400">{{ $item['information'] }}</p>
        </div>
    </div>
    @php
        $count++;
    @endphp
    @endforeach
</div>
@endsection