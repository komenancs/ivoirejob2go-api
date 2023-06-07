<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidature extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'candidat_id',
        'demande_id',
        'nombre_etoiles',
        'demande_date',
        'derniere_etoile_date',
        'approbation_date',
        'status_paiement',
        'user_create_id',
        'user_update_id'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
