@extends('layouts.template')

@section('content')
    <form action="{{ route('late.store') }}" class="card mt-3 p-5" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success')}}</div>
        @endif
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Siswa :</label>
            <div class="col-sm-10">
                <select name="name" id="name" class="form-control">
                @foreach ($students as $item)
                    <option selected hidden disabled value="{{ old('name') }}">Pilih</option>
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal :</label>
            <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late" value="{{ old('date_time_late') }} ">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="information" class="col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="information" name="information" value="{{ old('information') }}" rows="4" cols="50"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-label">Bukti :</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="bukti" name="bukti" value="{{ old('bukti') }} ">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
@endsection