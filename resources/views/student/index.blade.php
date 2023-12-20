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
                      <th scope="col" class="rounded-tr-lg text-sm font-medium px-6 py-4">
                        <a href="{{ route('student.create')}}" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out mr-4">TAMBAH</a>
                      </th>
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
                      <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-right flex">
                        <div>
                          <a href="{{ route('student.edit', $item['id']) }}" class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out mr-4">Edit</a>
                        </div>
                        <form action="{{ route('student.delete', $item['id']) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="font-medium text-red-600 hover:text-red-700 focus:text-red-700 active:text-red-800 transition duration-300 ease-in-out">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection