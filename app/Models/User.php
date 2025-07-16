<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'first_name',
        'last_name',
        'email',
        'password',
        'role'
    ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profile(): HasOne{
        return $this->hasOne(Profile::class,'user_id');
    }


    public function admin(): HasOne{
        return $this->hasOne(Admin::class,'user_id');
    }

    public function customer(): HasOne{
        return $this->hasOne(Customer::class,'user_id');
    }

    public function avatar(): HasOne{
        return $this->hasOne(Avatar::class,'user_id');
    }


    public function getAvatarUrlAttribute()
    {
        if ($this->avatar && Storage::disk('public')->exists($this->avatar->path)) {
            return asset('storage/' . $this->avatar->path);
        }
        return asset('default-avatar.png');
    }

    public function login(): HasOne{
        return $this->hasOne(Login::class,'user_id');
    }
}
