@extends('layouts.template')

@section('content')
    <form action="{{ route('rombel.store') }}" class="card mt-3 p-5" method="POST">
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
            <label for="rombel" class="col-sm-2 col-form-label">Nama Rombel :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="rombel" name="rombel" value="{{ old('rombel') }}">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
@endsection