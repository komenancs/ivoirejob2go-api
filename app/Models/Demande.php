<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'titre',
        'employeur_id',
        'description',
        'nombre_poste',
        'salaire',
        'type_contrat_id',
        'date_publication',
        'date_expiration',
        'user_create_id',
        'user_update_id',
    ];

    public function employeur()
    {
        return $this->belongsTo(Employeur::class);
    }

    public function type_contrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }

    

    public function metiers()
    {
        return $this->belongsToMany(Metier::class, 'demande_metier');
    }


    public function secteurs()
    {
        return $this->belongsToMany(Secteur::class, 'demande_secteur');
    }


    public function localisations()
    {
        return $this->belongsToMany(Localisation::class, 'demande_localisation');
    }
    

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'demande_competence');
    }

}
