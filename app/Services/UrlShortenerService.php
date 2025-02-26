<?php
namespace App\Services;

use App\Interfaces\UrlShortenerServiceInterface;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlShortenerService implements UrlShortenerServiceInterface
{
    public function shortenUrl(string $longUrl, ?int $expirationDays = null): string
    {

        $url = Url::where('long_url', $longUrl)->first();

        if ($url) {
            return $url->short_code;
        }

        $shortCode = Str::random(6);

        Url::createUrl($longUrl, $shortCode, $expirationDays);

        return $shortCode;
    }
}
