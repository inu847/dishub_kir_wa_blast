<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\GeneralSetting;
use App\Models\Kir;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

class WhatsappSennderController extends Controller
{
    public function send()
    {
        // $recipient = '+6282229200791';
        $recipient = '+6285730004337';
        
        $sid    = getenv("TWILIO_AUTH_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from= getenv("TWILIO_WHATSAPP_FROM");
        $twilio = new Client($sid, $token);
        
        $body = "Tes DISUB KIR REL";

        return $twilio->messages->create("whatsapp:$recipient",["from" => "whatsapp:$wa_from", "body" => $body]);
    }

    public function sendAgainWoowa($id)
    {
        $kir = Kir::find($id);

        $gen_setting = Helpers::generalSetting();
        $gen_setting->message_send = Helpers::getMessage($kir);
        
        $key_demo=  $gen_setting->api_wa;
        $url='http://45.77.34.32:8000/demo/send_message';
        $data = array(
            "phone_no"=> $kir->phone,
            "key"     => $key_demo,
            "message" => $gen_setting->message_send,
        );

        $data_string = json_encode($data,1);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 360);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string),
            'Authorization: Basic dXNtYW5ydWJpYW50b3JvcW9kcnFvZHJiZWV3b293YToyNjM3NmVkeXV3OWUwcmkzNDl1ZA=='
        ));
        $res=curl_exec($ch);
        curl_close($ch);
        $kir->reminder_count = $kir->reminder_count + 1;
        $kir->save();
        
        $dataReminder['kir_id'] = $kir->id;
        $dataReminder['user_id'] = Auth::user()->id ?? 0;
        $dataReminder['send_at'] = $kir->reminder_count;
        $dataReminder['message'] = $gen_setting->message_send;
        
        $reminder = Reminder::create($dataReminder);

        return redirect()->back()->with('success', 'Berhasil Mengirimkan Pesan');
    }

    public function wApiSender($id)
    {
        $kir = Kir::find($id);

        $gen_setting = Helpers::generalSetting();
        $gen_setting->message_send = Helpers::getMessage($kir);
        // dd($gen_setting);
        if ($gen_setting->image_sender) {
            $imageContents = File::get('storage/'.$gen_setting->image_sender);
            $gen_setting->image_sender = base64_encode($imageContents);

            $response = Http::post('https://wapisender.id/api/v1/send-image', [
                'api_key' => $gen_setting->api_wa,
                'device_key' => $gen_setting->device_key,
                'destination' => $kir->phone,
                'image' => $gen_setting->image_sender,
                'filename' => $gen_setting->filename,
                'caption' => $gen_setting->message_send,
            ]);
        }else{
            $response = Http::post('https://wapisender.id/api/v1/send-message', [
                'api_key' => $gen_setting->api_wa,
                'device_key' => $gen_setting->device_key,
                'destination' => $kir->phone,
                'message' => $gen_setting->message_send,
            ]);
        }
        $kir->reminder_count = (int)$kir->reminder_count + 1;
        $kir->save();

        $dataReminder['kir_id'] = $kir->id;
        $dataReminder['user_id'] = Auth::user()->id ?? 0;
        $dataReminder['send_at'] = $kir->reminder_count;
        $dataReminder['message'] = $gen_setting->message_send;
        
        $reminder = Reminder::create($dataReminder);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Berhasil Mengirimkan Pesan');
        }else {
            return redirect()->back()->with('danger', 'Gagal Mengirimkan Pesan');
        }
    }
}
