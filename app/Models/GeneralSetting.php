<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'first_reminder',
        'api_wa',
        'message_send',
        'last_reminder',
        'device_key',
        'image_sender',
        'filename'
    ];
}
