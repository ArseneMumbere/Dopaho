<?php

namespace App\Models;

// use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'nom',
        'postnom',
        'prenom',
        'phone',
        'birthdate',
        'profile_photo_path',
        'address',
        'bio',
        'is_active',
        'is_premium',
        'premium_until',
        'email_notifications',
        'sms_notifications',
        'appointment_reminders',
        'exam_results',
        'system_updates',
        'groupe_sanguin',
        'taille',
        'poids',
        'allergies',
        'maladies_chroniques',
        'antecedents',
    ];

    /**
     * Get the URL of the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return asset('storage/' . $this->profile_photo_path);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->nom . ' ' . $this->prenom) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
        'premium_until' => 'datetime',
        'is_premium' => 'boolean',
    ];

    /**
     * Check if the user has an active premium subscription.
     *
     * @return bool
     */
    public function isPremium(): bool
    {
        if ($this->is_premium && $this->premium_until) {
            return $this->premium_until->isFuture();
        }
        return false;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date',
        ];
    }

    /**
     * Get the user's age.
     *
     * @return int
     */
    public function getAgeAttribute(): int
    {
        return $this->birthdate->age;
    }
}
