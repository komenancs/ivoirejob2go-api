<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paiement extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'user_id',
        'date_paiement',
        'montant',
        'reference',
        'user_create_id',
        'user_update_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
