@extends('layouts.app')

@section('title', 'Welcome | People Portal')

@section('content')
    <section class="panel hero-panel">
        <p class="eyebrow">People Portal</p>
        <h1>A thoughtful home for your people.</h1>
        <p class="page-description">Keep the details that matter organized in one calm, simple space. Start a directory for your team in just a few clicks.</p>
        <div class="hero-actions">
            <a class="button" href="{{ route('user.index') }}">Explore users</a>
            <a class="button button-secondary" href="{{ route('user.create') }}">Add a person</a>
        </div>
    </section>

    <section class="feature-grid" aria-label="Portal features">
        <article class="feature-card">
            <span class="feature-number">01</span>
            <h2>Keep it organized</h2>
            <p>Bring essential member details together in one easy-to-browse directory.</p>
        </article>
        <article class="feature-card">
            <span class="feature-number">02</span>
            <h2>Quick to update</h2>
            <p>Add new people with a short, straightforward form that keeps things moving.</p>
        </article>
        <article class="feature-card">
            <span class="feature-number">03</span>
            <h2>Made for clarity</h2>
            <p>A clean, welcoming interface helps you focus on the people behind the details.</p>
        </article>
    </section>
@endsection
