@extends('layouts.admin')

@section('title')
    KIR
@endsection

@section('content')
    <div class='card'>
        <div class='mb-3'>
            <div class="float-left">
                <h4>KIR</h4>
            </div>
            <div class="float-right">
                <a href="{{ route('kir.create') }}" class="btn btn-primary">Tambah KIR</a>
            </div>
        </div>
        <div class='card-body'>
            <table id="datatable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>No. Kendaraan</th>
                        <th>No. Stuk</th>
                        <th>No. Telp</th>
                        <th>Exp Date</th>
                        <th>Waktu Kir Ulang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->no_license }}</td>
                            <td>{{ $item->no_stuck }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->exp_date }}</td>
                            <td>{{ Carbon\Carbon::parse($item->exp_date)->subDays(\app\Helpers\Helpers::generalSetting()->first_reminder) }}</td>
                            <td>
                                <a href="{{ route('kir.edit', [$item->id]) }}" class="btn btn-info mb-1"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-danger btnTrash mb-1" data-id="{{ $item->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <form action="{{ route('kir.destroy', $item->id) }}" id="trashEq{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" onclick="$('#sendReminderEq{{ $item->id }}').submit()" class="btn btn-warning mb-1 btnSendReminder" data-id="{{ $item->id }}">
                                    <i class="mdi mdi-whatsapp "></i>
                                </button>
                                <form action="{{ route('send.again', $item->id) }}" id="sendReminderEq{{ $item->id }}" method="POST">
                                    @csrf
                                </form>
                            </td>
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
