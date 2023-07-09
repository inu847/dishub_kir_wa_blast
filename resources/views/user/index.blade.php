@extends('layouts.admin')

@section('title')
    Manage User
@endsection

@section('content')
    <div class='card'>
        <div class='mb-3'>
            <div class="float-left">
                <h4>Manage User</h4>
            </div>
            <div class="float-right">
                <div class="d-flex align-items-center flex-wrap">
                    <a href="{{ route('user.create') }}"
                        class="btn btn-primary">
                        Create User
                    </a>
                </div>
            </div>
        </div>
        <div class='card-body'>
            <table id="datatable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('user.edit', [$item->id]) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    @if (!$item->employee)
                                    <form  action="{{ route('user.destroy', [$item->id]) }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('Apakah kamu yakin ingin me-nonaktifkan data ini?')"><i class="fa fa-trash"></i> </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
