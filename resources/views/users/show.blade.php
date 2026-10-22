@extends("layouts.app")

@section('title', $user->name . ' | People Portal')

@push('styles')
<style>
    .posts-panel {
        margin-top: 28px;
    }

    .posts-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
    }

    .posts-header .eyebrow {
        margin-bottom: 6px;
        font-size: 12px;
        letter-spacing: 0.12em;
    }

    .posts-title {
        margin: 0;
        color: #1e1b4b;
        font-size: 21px;
        letter-spacing: -0.035em;
    }

    .posts-count {
        display: inline-flex;
        min-width: 34px;
        min-height: 34px;
        padding: 0 10px;
        align-items: center;
        justify-content: center;
        border: 1px solid #ede9fe;
        border-radius: 999px;
        background: #f5f3ff;
        color: #6d28d9;
        font-size: 13px;
        font-weight: 750;
    }

    .posts-table-wrap {
        overflow-x: auto;
        border: 1px solid #e9e7f3;
        border-radius: 14px;
        background: #fff;
    }

    .posts-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .posts-table th {
        padding: 14px 18px;
        background: #f7f6fc;
        color: #64748b;
        font-size: 11px;
        font-weight: 750;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .posts-table td {
        padding: 17px 18px;
        color: #475569;
        font-size: 14px;
        line-height: 1.65;
        vertical-align: top;
    }

    .posts-table tbody tr+tr td {
        border-top: 1px solid #f1f0f6;
    }

    .posts-table tbody tr:hover {
        background: #fcfbff;
    }

    .posts-table td:first-child {
        width: 32%;
        color: #312e81;
        font-weight: 700;
    }

    .posts-empty {
        padding: 30px 20px;
        color: #64748b;
        font-size: 14px;
        text-align: center;
    }

    @media (max-width: 600px) {
        .posts-table {
            min-width: 480px;
        }

        .posts-table th,
        .posts-table td {
            padding: 13px 14px;
        }
    }
</style>
@endpush

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
                <span class="summary-value">{{ $user->profile?->phone ?? 'Not provided' }}</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Address</span>
                <span class="summary-value">{{ $user->profile?->address ?? 'Not provided' }}</span>
            </div>
        </div>
    </div>
</section>



<section class="panel posts-panel" aria-labelledby="posts-title">
    <div class="panel-body">
        <div class="posts-header">
            <div>
                <p class="eyebrow">Activity</p>
                <h2 class="posts-title" id="posts-title">Posts</h2>
            </div>
            <span class="posts-count" aria-label="{{ $user->posts->count() }} posts">
                {{ $user->posts->count() }}
            </span>
        </div>

        @if ($user->posts->isNotEmpty())
        <div class="posts-table-wrap">
            <table class="posts-table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="posts-empty">No posts to show yet.</p>
        @endif


    </div>
</section>



<section class="panel posts-panel" aria-labelledby="posts-title">
    <div class="panel-body">
        <div class="posts-header">
            <div>
                <p class="eyebrow">Activity</p>
                <h2 class="posts-title" id="posts-title">Roles</h2>
            </div>
            <span class="posts-count" aria-label="{{ $user->roles->count() }} roles">
                {{ $user->roles->count() }}
            </span>
        </div>


        @if ($user->roles->isNotEmpty())
        <div class="posts-table-wrap">
            <table class="posts-table">
                <thead>
                    <tr>
                        <th scope="col">Role Name</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="posts-empty">No Roles</p>
        @endif


    </div>
</section>



@endsection