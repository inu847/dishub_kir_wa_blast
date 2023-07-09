<?php
namespace App\Helpers;

use App\Models\GeneralSetting;
use Carbon\Carbon;

class Helpers
{
    public static function generalSetting()
    {
        $data = GeneralSetting::first();

        return $data;
    }

    public static function hari_ini($hari){
        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
     
            case 'Mon':			
                $hari_ini = "Senin";
            break;
     
            case 'Tue':
                $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
     
        return $hari_ini;
    }

    public static function getMessage($kir)
    {
        $gen_setting = Helpers::generalSetting();

        $gen_setting->message_send = str_replace('_name_', $kir->name, $gen_setting->message_send);
        $gen_setting->message_send = str_replace('_no_license_', $kir->no_license, $gen_setting->message_send);
        $gen_setting->message_send = str_replace('_no_stuck_', $kir->no_stuck, $gen_setting->message_send);
        $gen_setting->message_send = str_replace('_phone_', $kir->phone, $gen_setting->message_send);
        $gen_setting->message_send = str_replace('_reminder_count_', $kir->reminder_count, $gen_setting->message_send);

        $hari = Helpers::hari_ini(Carbon::parse($kir->exp_date)->format('D'));
        $exp_date = $hari.", ".Carbon::parse($kir->exp_date)->format('d M Y');
        $gen_setting->message_send = str_replace('_exp_date_', $exp_date, $gen_setting->message_send);
        
        $gen_setting->message_send = json_encode($gen_setting->message_send);
        
        $gen_setting->message_send = str_replace('\r\n', '\n', $gen_setting->message_send);
        $gen_setting->message_send = json_decode($gen_setting->message_send);

        return $gen_setting->message_send;
    }

    public static function base64($file, $file_path)
    {
        $file_parts = explode(";base64,", $file);
        $file_type = explode('/', mime_content_type($file))[1];

        $files = base64_decode($file_parts[1]);
        $folderPath = 'storage/'.$file_path.'/';
        $fileName = uniqid();
        $fileFullPath = $folderPath.$fileName.".".$file_type;
        file_put_contents($fileFullPath, $files);
        return $fileFullPath;
    }
}
?>