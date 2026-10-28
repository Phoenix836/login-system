<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'asset_name',
        'category',
        'serial_number',
        'purchase_date',
        'assigned_to',
        'status',
        'user_id',
    ];
}
