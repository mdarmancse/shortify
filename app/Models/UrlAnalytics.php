<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UrlAnalytics extends Model
{
    protected $fillable = [
        'url_id',
        'ip_address',
        'user_agent',
        'clicked_at',
    ];

    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class);
    }

    public static function trackAnalytics(int $urlId, string $ipAddress, string $userAgent)
    {
        return self::insert([
            'url_id' => $urlId,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'clicked_at' => now(),
        ]);
    }
}
