<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Abonnement extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'nom',
        'montant',
        'type',
        "nombre_demande",
        'description',
        'user_create_id',
        'user_update_id',
    ];

    

    public function employeurs()
    {
        return $this->hasMany(Employeur::class);
    }

    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }

}
