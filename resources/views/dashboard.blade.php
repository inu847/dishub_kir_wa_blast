@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard 1</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>  

        <div class="row">
            {{-- <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                        </div>
        
                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Revenue</p>
                            <h3 class="font-weight-medium my-2">Rp. <span data-plugin="counterup">{{ number_format($dataCart['price']) }}</span></h3>
                            <p class="m-0">{{ now()->format('M-Y') }}</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- end col -->
        
            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                        </div>
        
                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total User</p>
                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{ $dataCart['user_count'] }}</span></h3>
                            <p class="m-0"><a href="{{ route('user.index') }}">Show all</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        
            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class="mdi mdi-crown avatar-title font-30 text-white"></i>
                        </div>
        
                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total KIR</p>
                            <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{ $dataCart['kir_count'] }}</span></h3>
                            <p class="m-0"><a href="{{ route('kir.index') }}">Show all</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        
            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class="mdi mdi-auto-fix  avatar-title font-30 text-white"></i>
                        </div>
        
                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Sender</p>
                            <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{ $dataCart['sender_count'] }}</span></h3>
                            <p class="m-0">{{ now()->format('M-Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    <div class='card'>
        <div class='mb-3'>
            <div class="float-left">
                <h4>History Reminder</h4>
            </div>
        </div>
        <div class='card-body'>
            <table id="datatable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>No. Kendaraan</th>
                        <th>No. Telp</th>
                        <th>Reminder By</th>
                        <th>Message</th>
                        <th>Reminder Date</th>
                        <th>Reminder At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->kir->name ?? null }}</td>
                            <td>{{ $item->kir->no_license ?? null }}</td>
                            <td>{{ $item->kir->phone ?? null }}</td>
                            <td>{{ ($item->user_id > 0) ? ($item->user->name ?? null) : 'system' }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->send_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    @push('js')
    <script>
        $(function() {
            $('.btnTrash').on('click', function() {
                var id = $(this).data('id');
                alertConfirmation(
                    'Apakah anda yakin?',
                    "Data yang sudah dihapus tidak bisa dikembalikan!",
                    `#trashEq${id}`,
                    'submit');
            });
        });
    </script>
    @endpush
@endsection
