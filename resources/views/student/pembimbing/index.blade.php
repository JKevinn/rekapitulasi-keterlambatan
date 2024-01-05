@extends('layouts.template')

@section('content')
@if (Session::get('success'))
<div class="alert alert-success">{{ Session::get('success')}}</div>
@endif
@if (Session::get('deleted'))
<div class="alert alert-warning">{{Session::get('deleted')}}</div>
@endif
<div class="container my-8 mx-auto px-4 md:px-6 lg:px-12">
    <section class="mb-20 text-gray-800">
      <div class="block shadow-lg bg-white">
        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full mb-0">
                  <thead class="border-b rounded-t-lg text-left">
                    <tr>
                      <th scope="col" class="rounded-tl-lg text-sm font-medium px-6 py-4">NO</th>
                      <th scope="col" class="rounded-tl-lg text-sm font-medium px-6 py-4">NIS</th>
                      <th scope="col" class="text-sm font-medium px-6 py-4">NAME</th>
                      <th scope="col" class="text-sm font-medium px-6 py-4">ROMBEL</th>
                      <th scope="col" class="text-sm font-medium px-6 py-4">RAYON</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($students as $item)                        
                    <tr class="border-b">
                      <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $no }}</td>
                      <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item['nis'] }}</td>
                      <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item['name'] }}</td>
                      <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item->rombel->rombel }}</td>
                      <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item->rayon->rayon }}</td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-flex justify-content-end">
                @if ($students->count())
                    {{$students->links()}}
                @endif
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection