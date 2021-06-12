<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisions_id',
        'divisions_name',
        'divisions_shortname'
    ];

    /**
     * Get the user that owns the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo(Report::class, 'divisions_id', 'divisions_id');
    }
}
