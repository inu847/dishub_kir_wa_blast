@extends('layouts.admin')

@section('title')
    Create User
@endsection

@section('content')
    <div class='card'>
        <h4>Create User</h4>
        <div class='card-body'>
            <form action='{{ route('user.store') }}' method='POST' enctype='multipart/form-data'>
                @csrf
                <div class="form-group row">
                    <div class='col-md-6'>
                        <label for=''>Nama</label>
                        <input type='text' value="{{ old('name') }}" class='form-control @error('name') is-invalid @enderror' name='name' id='' placeholder='Nama'>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='col-md-6'>
                        <label for=''>Email</label>
                        <input type='email' value="{{ old('email') }}" class='form-control @error('email') is-invalid @enderror' name='email' id='' placeholder='Email'>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                </div>
                <div class="form-group row">
                    <div class='col-md-6'>
                        <label for=''>Password</label>
                        <input type='password' value="{{ old('password') }}" class='form-control @error('Password') is-invalid @enderror' name='password' id='' placeholder=''>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='col-md-6'>
                        <label for=''>Konfirmasi Password</label>
                        <input type='password' value="{{ old('konfirmasi_password') }}" class='form-control @error('konfirmasi_password') is-invalid @enderror' name='konfirmasi_password' id='' placeholder=''>
                        @error('konfirmasi_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('user.index') }}"  class='btn btn-danger float-left mb-4'>Kembali</a>
                <button type='submit' class='btn btn-primary float-right mb-4'>Tambah</button>
            </form>
        </div>
    </div>
@endsection
