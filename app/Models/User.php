<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use BezhanSalleh\FilamentShield\Support\Utils;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use Stephenjude\FilamentTwoFactorAuthentication\TwoFactorAuthenticatable;

class User extends Authenticatable implements FilamentUser, HasAvatar//, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPanelShield, TwoFactorAuthenticatable;// 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'avatar_url',
        'password',
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

    //for avatar edit profile
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url("$this->avatar_url") : null;
    }


    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // User Authenticate valid and email @gmail only
    public function canAccessPanel(Panel $panel): bool
    {
        //// if you have 2 or more panels you can use this code to access the specific panel.
        // if ($panel->getId() ==='admin') {
        //     return $this->hasRole(Utils::getSuperAdminName());
        // }
        // elseif ($panel->getId() ==='user') {
        //     return $this->hasRole(config('filament-shield.name', 'panel_user'));
        // }
        // else{
        //  return false;
        //  }
        
        ////Original function in FilamentPHP
        // return str_ends_with($this->email, '@gmail.com');// && $this->hasVerifiedEmail();
        
        //// you can also use this code to access the panel by role
        return $this->hasRole(config('filament-shield.super_admin.name')) || $this->hasRole(config('filament-shield.panel_user.name'))
            && str_ends_with($this->email, '@gmail.com')
        ;
    }
}

