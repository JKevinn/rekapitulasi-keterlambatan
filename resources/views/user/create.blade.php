@extends('layouts.template')

@section('content')
    <form action="{{ route('user.store') }}" class="card mt-3 p-5" method="POST">
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
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Role :</label>
            <div class="col-sm-10">
                <select name="role" id="role" class="form-control">
                <option selected hidden disabled>Pilih</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="Pembimbing Siswa" {{ old('role') == 'Pembimbing Siswa' ? 'selected' : '' }}>Pembimbing Siswa</option>
                </select>
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
@endsection