<?php
namespace App\Http\Controllers;

use App\Interfaces\UrlShortenerServiceInterface;
use App\Models\Url;
use App\Models\UrlAnalytics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UrlShortenerController extends Controller
{
    protected $urlShortenerService;

    public function __construct(UrlShortenerServiceInterface $urlShortenerService)
    {
        $this->urlShortenerService = $urlShortenerService;
    }

    public function index()
    {
        $urls = Url::latest()->get();
        return view('urls.index', compact('urls'));
    }


    public function shorten(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url',
            'expiration_days' => 'nullable|integer|min:1',
        ]);


        $shortCode = $this->urlShortenerService->shortenUrl(
            $request->input('long_url'),
            $request->input('expiration_days')
        );


        Session::flash('short_url', $shortCode);

        return redirect()->route('url.shortener');
    }


    public function redirect($shortCode)
    {

        $url = Url::findByShortCode($shortCode);


        if ($url->isExpired()) {
            return redirect()->route('url.shortener')->with('error', 'This URL has expired.');
        }


        UrlAnalytics::trackAnalytics($url->id, request()->ip(), request()->userAgent());

        return redirect($url->long_url);
    }


    public function analytics($shortCode)
    {
        $url = Url::with('analytics')->where('short_code', $shortCode)->firstOrFail();


        $analytics = [
            'url' => url("/$shortCode"),
            'total_clicks' => $url->analytics->count(),
            'details' => $url->analytics,
        ];

        Session::flash('analytics', $analytics);

        return redirect()->route('url.shortener');
    }
}
