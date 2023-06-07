<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Secteur extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'nom',
        'user_create_id',
        'user_update_id',
    ];

    public function demandes()
    {
        return $this->belongsToMany(Demande::class, 'demande_secteur');
    }

    public function employeurs(){
        return $this->belongsToMany(Employeur::class, 'employeur_secteur');
    }
    
}
