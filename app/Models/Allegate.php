<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allegate extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'allegates_id',
        'allegates_name',
        'allegates_detail'
    ];
}
