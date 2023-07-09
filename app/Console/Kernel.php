<?php

namespace App\Console;

use App\Helpers\Helpers;
use App\Models\Kir;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // Masukkan Kode Anda Disini
        $schedule->call(function () {
            
        $kir = Kir::orderBy('id', 'desc')->get();

        $count_fr = 0;
        $count_lr = 0;
        $phone_first_reminder = [];
        $phone_last_reminder = [];
        
        $gen_setting = Helpers::generalSetting();

        $first =  $gen_setting->first_reminder;
        $last =  $gen_setting->last_reminder;
        
        foreach ($kir as $key => $value) {
            $reminder_check = Reminder::orderBy('id', 'desc')->where(['kir_id' => $value->id, 'user_id' => 0])->count();
            $fr = Carbon::parse($value->exp_date)->subDays($first);
            
            if($reminder_check >= 1 && $reminder_check <= 2){
                $lr = Carbon::parse($value->exp_date)->subDays($last);
                if ($lr < now()) {
                    $this->sendMessage($gen_setting, $value);
                    $count_lr++;
                }
            }else if ($fr < now() && $reminder_check == 0) {
                $this->sendMessage($gen_setting, $value);
                $phone_first_reminder[$count_fr] = $value->phone;
                $count_fr++;
            }
            
        }
        
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    public function sendMessage($gen_setting, $kir)
    {
        $message = Helpers::getMessage($kir);

        // API WOOWA
        // $key_demo= $api_wa;
        // $url='http://45.77.34.32:8000/demo/send_message';
        // $data = array(
        //     "phone_no"=> $kir->phone,
        //     "key"     => $key_demo,
        //     "message" => $message,
        // );

        // $data_string = json_encode($data,1);

        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_VERBOSE, 0);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 360);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        //     'Content-Length: ' . strlen($data_string),
        //     'Authorization: Basic dXNtYW5ydWJpYW50b3JvcW9kcnFvZHJiZWV3b293YToyNjM3NmVkeXV3OWUwcmkzNDl1ZA=='
        // ));
        // $res=curl_exec($ch);
        // curl_close($ch);

        // API WASENDER
        $gen_setting->message_send = Helpers::getMessage($kir);
        if (isset($gen_setting->image_sender)) {
            $imageContents = public_path('storage/'.$gen_setting->image_sender);
            $image_sender = base64_encode($imageContents);
            // dd($gen_setting);
            $response = Http::post('https://wapisender.id/api/v1/send-image', [
                'api_key' => $gen_setting->api_wa,
                'device_key' => $gen_setting->device_key,
                'destination' => $kir->phone,
                'image' => $image_sender,
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
        $dataReminder['user_id'] = 0;
        $dataReminder['send_at'] = $kir->reminder_count ?? 0;
        $dataReminder['message'] = $message;

        $reminder = Reminder::create($dataReminder);

        Log::info('Send to : '.$kir->phone);
    }
}
