@extends('layouts.app')

@section('title', 'Users | People Portal')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Your directory</p>
            <h1>People, all in one place.</h1>
            <p class="page-description">Keep your team’s details organized and easy to find.</p>
        </div>
        <a class="button" href="{{ route('user.create') }}">＋ <span>Add a user</span></a>
    </div>

    <section class="panel">
        <div class="panel-body">
            <p class="eyebrow">Getting started</p>
            <h2>Your directory is ready</h2>
            <p class="page-description">Add your first person to get started. Their name and age will be collected in a quick, simple form.</p>
            <div style="margin-top: 24px;">
                <a class="button button-secondary" href="{{ route('user.create') }}">Create your first user</a>
            </div>
        </div>
    </section>
@endsection
