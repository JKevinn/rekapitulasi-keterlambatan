@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
      <a href="{{ route('late.pembimbing.export-excel') }}" class="bg-green-400 hover:bg-green-500 underline font-medium py-2 px-4 rounded">Export Excel .xls</a>
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Data
                    Keseluruhan</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Data Rekapitulasi</button>
            </li>
        </ul>
    </div>

    <div id="default-tab-content">

        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <!-- Start coding here -->
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
                                        <th scope="col" class="rounded-tl-lg text-sm font-medium px-6 py-4">NAMA</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">TANGGAL</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">INFORMASI</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                      @foreach ($studentslate as $item)                                          
                                      <tr class="border-b">
                                          <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $no }}</td>
                                          <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item->student->name }}</td>
                                          <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item->date_time_late }}</td>
                                          <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item->information }}</td>
                                        </tr>
                                        @php
                                          $no++;
                                          @endphp
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                  @if ($studentslate->count())
                                      {{$studentslate->links()}}
                                  @endif
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
                  </table>
                </div>
            </section>
        </div>


        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <!-- Start coding here -->
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
                                        <th scope="col" class="text-sm font-medium px-6 py-4">NAMA</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">JUMLAH</th>
                                        <th scope="col" class="rounded-tr-lg text-sm font-medium px-6 py-4">
                                        </th>
                                        <th scope="col" class="rounded-tr-lg text-sm font-medium px-6 py-4">
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $nomor = 1;
                                      @endphp
                                      @foreach ($studentslategroup as $item)    
                                      <tr class="border-b">
                                        <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $nomor }}</td>
                                        <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item->nis }}</td>
                                        <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ $item->name }}</td>
                                        <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500">{{ count($item->late) }}</td>
                                        <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left text-gray-500"> 
                                          <div>
                                            <a href="{{ route('late.pembimbing.show', $item['id']) }}" class="font-small text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out mr-4">Lihat</a>
                                          </div>
                                        </td>
                                        <td class="text-sm font-normal px-6 py-4 whitespace-nowrap text-right flex">
                                            @if (count($item->late) >= 3)
                                            <div>
                                              <a href="{{ route('late.pembimbing.download', $item['id']) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Cetak Surat Pernyataan</a>
                                            </div>
                                            @endif
                                        </td>
                                      </tr>
                                      @php
                                          $nomor++;
                                      @endphp
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                  @if ($studentslategroup->count())
                                      {{$studentslategroup->links()}}
                                  @endif
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
                  </table>
                </div>
            </section>
        </div>
    </div>
@endsection
