<?php

namespace App\Interfaces;

interface UrlShortenerServiceInterface
{
    public function shortenUrl(string $longUrl, ?int $expirationDays = null): string;
}
