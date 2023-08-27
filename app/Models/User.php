<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'aprendiz_id',
        'instructor_id',
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
        'password' => 'hashed',
    ];

    //Los comités a los que pertenece el Usuario
    public function comites(): BelongsToMany
    {
        return $this->belongsToMany(Comite::class)->as('ComiteUser');
    }

    //Obtener el aprendiz dueño del Usuario
    public function aprendiz(): BelongsTo
    {
        return $this->belongsTo(Aprendiz::class);
    }

    //Obtener el instructor dueño del Usuario
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }
}