@extends('layouts.template')

@section('content')
    <form action="{{ route('student.admin.update', $student['id']) }}" class="card mt-3 p-5" method="POST">
         @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @csrf
        @method('PATCH')
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nis" name="nis" value="{{ $student['nis'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $student['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel" class="col-sm-2 col-form-label">Rombel :</label>
            <div class="col-sm-10">
                <select name="rombel" id="rombel" class="form-control">
                    @foreach ($rombels as $item)
                    <option selected hidden disabled>Pilih</option>
                    <option value="{{ $item->id }}" {{ $item->id == $item->id ? 'selected' : '' }}>{{ $item->rombel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rayon" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <select name="rayon" id="rayon" class="form-control">
                    @foreach ($rayons as $item)
                    <option selected hidden disabled value="{{ old('rayon') }}">Pilih</option>
                    <option value="{{ $item->id }}" {{ $item->id == $item->id ? 'selected' : '' }}>{{ $item->rayon }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
@endsection