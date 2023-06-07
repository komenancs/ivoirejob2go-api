<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;

    protected $fillable = [
        'candidat_id',
        'job_title',
        'activity_description',
        'start_date',
        'end_date',
        'company_name',
        'user_create_id',
        'user_update_id',
    ];

    public function candidat()
    {
       return $this->belongsTo(Candidat::class);
    }

}
