@extends('layouts.template')

@section('content')
    <form action="{{ route('rayon.store') }}" class="card mt-3 p-5" method="POST">
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
            <label for="rayon" class="col-sm-2 col-form-label">Nama Rayon :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="rayon" name="rayon" value="{{ old('rayon') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pembina" class="col-sm-2 col-form-label">Pembimbing Rayon :</label>
            <div class="col-sm-10">
                <select name="pembina" id="pembina" class="form-control">
                @foreach ($users as $item)
                    <option selected hidden disabled value="{{ old('rayon') }}">Pilih</option>
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
@endsection