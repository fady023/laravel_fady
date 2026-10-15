@extends('layouts.app')

@section('title', 'Home | People Portal')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Welcome</p>
            <h1>Your people, in one place.</h1>
            <p class="page-description">Use your directory to keep member details organized and easy to access.</p>
        </div>
        <a class="button" href="{{ route('user.create') }}">Add a user</a>
    </div>

    <section class="panel">
        <div class="panel-body">
            <h2>Get started with your directory</h2>
            <p class="page-description">Visit the users page to see your directory, or add a new member to get started.</p>
            <div class="hero-actions">
                <a class="button" href="{{ route('user.index') }}">View users</a>
                <a class="button button-secondary" href="{{ route('user.create') }}">Create a user</a>
            </div>
        </div>
    </section>
@endsection
