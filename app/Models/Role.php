<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CreatedUpdatedBy;


    protected $fillable = [
        'nom',
        'description',
        'user_create_id',
        'user_update_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
