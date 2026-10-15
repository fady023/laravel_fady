@extends('layouts.app')

@section('title', 'User details | People Portal')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Member profile</p>
            <h1>User details</h1>
            <p class="page-description">A quick look at this member’s information.</p>
        </div>
        <a class="button button-secondary" href="{{ route('user.index') }}">Back to users</a>
    </div>

    <section class="panel">
        <div class="panel-body">
            <h2>{{ $name }}</h2>
            <div class="user-summary">
                <div class="summary-item">
                    <span class="summary-label">Name</span>
                    <span class="summary-value">{{ $name }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Age</span>
                    <span class="summary-value">{{ $id }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection
