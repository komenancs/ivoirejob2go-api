<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Localisation extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'pays',
        'ville',
        'user_create_id',
        'user_update_id',
        'quatier',
        'rue',
    ];


    public function demandes()
    {
        return $this->belongsToMany(Demande::class, 'demande_localisation');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function employeurs()
    {
        return $this->hasMany(Employeur::class);
    }
    
}
