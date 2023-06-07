<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employeur extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'user_id',
        'localisation_id',
        'description',
        'logo',
        'email',
        'contact_1',
        'contact_2',
        'site_web',
        'abonnement_id',
        'nombre_demandes_restantes',
        'lien_twitter',
        'lien_facebook',
        'lien_linkedin',
        'user_create_id',
        'user_update_id',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function secteurs()
    {
        return $this->belongsToMany(Secteur::class, 'employeur_secteur');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

}
