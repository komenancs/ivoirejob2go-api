<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'surname',
        'password',
        'telephone',
        'nom_entreprise',
        'poste_occupe',
        'photo',
        'linkedin',
        'twitter',
        'instagram',
        'date_verification_email',
        'role_id',
        'localisation_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }

    public function candidat(){
        return $this->hasOne(Candidat::class);
    }

    public function employeur()
    {
        return $this->hasOne(Employeur::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }


    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function inbox()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    public function sent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
