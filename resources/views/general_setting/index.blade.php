@extends('layouts.admin')

@section('title')
    General Setting
@endsection

@section('content')
    <div class='card'>
        <h4>General Setting</h4>
        <div class='card-body'>
            <form action='{{ route('general-setting.update', [$data->id]) }}' method='POST' enctype='multipart/form-data'>
                @csrf
                <div class='form-group'>
                    <label for=''>First Reminder</label>
                    <input type='number' class='form-control' name='first_reminder' value="{{ $data->first_reminder ?? null }}" id=''>
                </div>
                <div class='form-group'>
                    <label for=''>Last Reminder</label>
                    <input type='number' class='form-control' name='last_reminder' value="{{ $data->last_reminder ?? null }}" id=''>
                </div>
                <div class='form-group'>
                    <label for=''>API KEY</label>
                    <input type='text' class='form-control' name='api_wa' value="{{ $data->api_wa ?? null }}" id=''>
                </div>
                <div class='form-group'>
                    <label for=''>DEVICE KEY</label>
                    <input type='text' class='form-control' name='device_key' value="{{ $data->device_key ?? null }}" id=''>
                </div>
                <div class='form-group'>
                    <label for=''>Image Sender</label>
                    <img class="row" src="{{ asset('storage/'. $data->image_sender) }}" width="200px" alt="">
                    <input type='file' class='form-control' name='image_sender' id=''>
                </div>
                <div class='form-group'>
                    <label for=''>Message</label>
                    <textarea id="" cols="30" rows="5" class='form-control' name='message_send'>{{ $data->message_send ?? null }}</textarea>
                </div>
                
                <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
    </div>
@endsection
