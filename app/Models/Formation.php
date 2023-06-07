<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'candidat_id',
        'titre',
        'ecole',
        'date_debut',
        'date_fin',
        'description',
        'user_create_id',
        'user_update_id',
    ];

    public function candidat()
    {
       return $this->belongsTo(Candidat::class);
    }

}
