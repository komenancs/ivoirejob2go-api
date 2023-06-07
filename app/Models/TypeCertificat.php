<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeCertificat extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'organisme_nom',
        'organisme_logo',
        'certification_nom',
        'user_create_id',
        'user_update_id',
    ];

    public function certificats()
    {
        $this->hasMany(Certificat::class, 'type_certificat_id');
    }
}
