@extends('layouts.admin')

@section('title')
    Tambah KIR
@endsection

@section('content')
    <div class='card'>
        <h4>Tambah KIR</h4>
        <div class='card-body'>
            <form action='{{ route('kir.store') }}' method='POST' enctype='multipart/form-data'>
                @csrf
                <div class='form-group'>
                    <label for=''>Nama Pemilik <span class="text-danger">(*)</span></label>
                    <input type='text' class='form-control @error('name') is-invalid @enderror' name='name' value="{{old('name')}}" id='' placeholder='Nama Pemilik'>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for=''>No. Kendaraan <span class="text-danger">(*)</span></label>
                    <input type='text' class='form-control @error('no_license') is-invalid @enderror' name='no_license' value="{{old('no_license')}}" id='' placeholder='No. Kendaraan'>
                    @error('no_license')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for=''>No. Stuk <span class="text-danger">(*)</span></label>
                    <input type='text' class='form-control @error('no_stuck') is-invalid @enderror' name='no_stuck' value="{{old('no_stuck')}}" id='' placeholder='No. Stuk'>
                    @error('no_stuck')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for=''>No. Telp <span class="text-danger">(*)</span></label>
                    <input type='text' class='form-control @error('phone') is-invalid @enderror' name='phone' value="{{old('phone')}}" id='' placeholder='No. Telp'>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='form-group'>
                    <label for=''>Exp Date <span class="text-danger">(*)</span></label>
                    <input type='date' class='form-control @error('exp_date') is-invalid @enderror' name='exp_date' value="{{old('exp_date')}}" id='' placeholder='No. Telp'>
                    @error('exp_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <a href="{{ route('kir.index') }}"  class='btn btn-danger float-left mb-4'>Kembali</a>
                <button type='submit' class='btn btn-primary float-right mb-4'>Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('css')
<link href="{{ asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <script src="{{ asset('assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>

    <!-- Init js-->
    <script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
@endpush
