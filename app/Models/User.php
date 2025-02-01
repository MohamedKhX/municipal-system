<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserType;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser

{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'type',
        'phone_number',
        'gender',
        'municipality_id',
        'national_number',
        'email',
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

    protected $casts = [
      'type' => UserType::class
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

    public function name(): Attribute
    {
        return Attribute::get(fn() => $this->first_name . ' ' . $this->last_name);
    }

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function serviceRatings(): HasMany
    {
        return $this->hasMany(ServiceRating::class);
    }

    public function hasRating(Service $service): bool
    {
        // DATABASE -> user_id = $this->Id, & , service_id = $service->id
        return $this->serviceRatings()->where('service_id', $service->id)->get()->isNotEmpty();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin' && $this->type == UserType::Admin) {
            return true;
        }

        if ($panel->getId() === 'municipality' && $this->type == UserType::Employee) {
            return true;
        }

        return false;
    }
}
