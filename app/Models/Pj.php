<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pj extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'message_id',
        'filename',
        'extension',
        'path',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
