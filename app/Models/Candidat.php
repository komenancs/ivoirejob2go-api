<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidat extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'user_id',
        'abonnement_id',
        'nombre_demandes_restantes',
        'fin_abonnement',
        'presentation',
        'user_create_id',
        'user_update_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    public function certificats()
    {
        return $this->hasMany(Certificat::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competence_candidat');
    }

    public function metiers()
    {
        return $this->belongsToMany(Metier::class, 'candidat_metier');
    }

    public function demandes()
    {
        return $this->belongsToMany(Demande::class, 'candidatures');
    }

}
