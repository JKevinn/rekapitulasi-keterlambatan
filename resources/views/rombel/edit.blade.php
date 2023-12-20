@extends('layouts.template')

@section('content')
    <form action="{{ route('rombel.update', $rombel['id']) }}" class="card mt-3 p-5" method="POST">
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
            <label for="rombel" class="col-sm-2 col-form-label">Nama Rombel :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="rombel" name="rombel" value="{{ $rombel['rombel'] }}">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
@endsection