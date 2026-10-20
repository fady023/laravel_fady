@extends("layouts.app")

@section('title', $user->name . ' | People Portal')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Member profile</p>
            <h1>{{ $user->name }}</h1>
            <p class="page-description">View this member’s account details.</p>
        </div>
        <a class="button button-secondary" href="{{ route('user.index') }}">Back to users</a>
    </div>

    <section class="panel" aria-label="User profile">
        <div class="panel-body">
            <p class="eyebrow">Profile details</p>
            <div class="user-summary">
                <div class="summary-item">
                    <span class="summary-label">Name</span>
                    <span class="summary-value">{{ $user->name }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">Email</span>
                    <span class="summary-value">{{ $user->email }}</span>
                </div>
                <div class="summary-item">
                    <span class="summary-label">User ID</span>
                    <span class="summary-value">{{ $user->id }}</span>
                </div>

                 <div class="summary-item">
                    <span class="summary-label">Phone</span>
                    <span class="summary-value">{{ $user->profile->phone }}</span>
                </div>

                 <div class="summary-item">
                    <span class="summary-label">Address</span>
                    <span class="summary-value">{{ $user->profile->address }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection
