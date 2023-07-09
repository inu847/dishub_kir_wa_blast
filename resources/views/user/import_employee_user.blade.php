@extends('layouts.admin')

@section('title')
    Import Akun Karyawan
@endsection

@section('content')
    <div class='card'>
        <div class="d-flex justify-content-between">
            <h4>Import Akun Karyawan</h4>
           <div>
                <a href="{{ route('employee-user.exportEmployee') }}" class="btn btn-success">Download Template</a>
           </div>
        </div>
        <div class='card-body'>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('employee-user.importStore') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group row mb-4">
                    <div class="col-md-6">
                        <label>Masukkan File</label>
                        <input name="file"
                               type="file"
                               class="form-control
                               @error('file') is-invalid @enderror">
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-primary mr-2">Import</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
            <div class="mt-4">
                <p>Sebelum import Akun Karyawan, silahkan ikuti langkah-langkah berikut:
                   <ul>
                          <li>Isi data sesuai dengan template yang telah di download. Bila belum mendownload template silahkan download template terlebih dahulu dengan mengklik button <b>Download Template</b> di pojok kanan atas</li>
                          <li>Simpan file dengan format <b>.xlsx</b></li>
                          <li>Upload file yang telah diisi</li>
                   </ul>
                </p>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4>Kode Shift</h4>
                <div class="card-body p-0 mt-2">
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th width="20%">Kode</th>
                                <th>Shift</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shift as $key => $shft)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $shft }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h4>Kode Jabatan</h4>
                <div class="card-body p-0 mt-2">
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th width="20%">Kode</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($position as $key => $pst)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $pst }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h4>Kode Area</h4>
                <div class="card-body p-0 mt-2">
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th width="20%">Kode</th>
                                <th>Area</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($area as $key => $ar)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $ar }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h4>Kode Sub Area</h4>
                <div class="card-body p-0 mt-2">
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th width="20%">Kode</th>
                                <th>Sub Area</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workingArea as $key => $wra)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $wra }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

    @push('css')
    <style>
        .table.no-border thead tr th{
            border: none !important;
        }

        .table.no-border tbody tr td{
            border: none !important;
        }

        .dataTables_wrapper .dataTables_filter{
            float: left !important;
        }
    </style>
    @endpush
    @push('js')
    <script>
        $(function() {
            $('table').dataTable({
                "info": false,
            });
        })
    </script>
    @endpush

@endsection
