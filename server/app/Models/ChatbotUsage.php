<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_time",
        "end_time"
    ];
}
