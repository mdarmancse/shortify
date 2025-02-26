<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Url extends Model
{
    protected $fillable = [
        'long_url',
        'short_code',
        'expires_at',
    ];


    public function analytics(): HasMany
    {
        return $this->hasMany(UrlAnalytics::class);
    }


    public static function findByShortCode(string $shortCode): self
    {
        return self::where('short_code', $shortCode)->firstOrFail();
    }


    public static function createUrl(string $longUrl, string $shortCode, ?int $expirationDays = null): self
    {
        return self::create([
            'long_url' => $longUrl,
            'short_code' => $shortCode,
            'expires_at' => $expirationDays ? now()->addDays($expirationDays) : null, // Set expiration date
        ]);
    }


    public function isExpired(): bool
    {
        return $this->expires_at && now()->gt($this->expires_at);
    }
}
