<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificat extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'type_certificat_id',
        'candidat_id',
        'nom',
        'numero_certificat',
        'date_obtention',
        'user_create_id',
        'user_update_id',
    ];

    public function type_certificat()
    {
        return $this->belongsTo(TypeCertificat::class, 'type_certificat_id');
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    
}
