<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kir extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'no_license',
        'no_stuck',
        'phone',
        'reminder_count',
        'exp_date',
    ];
}
