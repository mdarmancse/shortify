@extends('layouts.app')

@section('title', 'Shortify')
@section('header', 'Shortify')

@section('content')


    <div class="card shadow-sm p-4 mb-4">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <form action="{{ route('url.shorten') }}" method="POST" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="long_url" class="form-label">Enter Long URL:</label>
                <input type="url" name="long_url" id="long_url" class="form-control" placeholder="https://example.com" required>
            </div>
            <div class="mb-3">
                <label for="expiration_days" class="form-label">Expiration (in days, optional):</label>
                <input type="number" name="expiration_days" id="expiration_days" class="form-control" placeholder="e.g., 30">
            </div>
            <button type="submit" class="btn btn-primary">Shorten URL</button>
        </form>
    </div>


    @if (session('short_url'))
        <div class="alert alert-success mt-4">
            <h3>Shortened URL:</h3>
            <a href="{{ session('short_url') }}" target="_blank">{{ session('short_url') }}</a>
        </div>
    @endif


    <div class="card shadow-sm p-4 mt-5">
        <h2 class="mb-4">All Shortened URLs</h2>
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Long URL</th>
                <th>Short Code</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($urls as $index => $url)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><a href="{{ $url->long_url }}" target="_blank">{{ Str::limit($url->long_url, 50) }}</a></td>
                    <td><a href="{{ url("/{$url->short_code}") }}" target="_blank">{{$url->short_code}}</a></td>
                    <td>
                        <a href="{{ route('url.analytics', $url->short_code) }}" class="btn btn-sm btn-outline-primary">View Analytics</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    @if (session('analytics'))
        <div class="card shadow-sm p-4 mt-5">
            <h2>Analytics for: {{ session('analytics.url') }}</h2>
            <p><strong>Total Clicks:</strong> {{ session('analytics.total_clicks') }}</p>
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>IP Address</th>
                    <th>User Agent</th>
                    <th>Clicked At</th>
                </tr>
                </thead>
                <tbody>
                @foreach (session('analytics.details') as $index => $click)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $click->ip_address }}</td>
                        <td>{{ Str::limit($click->user_agent, 50) }}</td>
                        <td>{{ $click->clicked_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
