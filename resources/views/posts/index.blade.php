@extends('layouts.app')

@section('title', 'Posts')

@push('styles')
    <style>
        .posts-panel {
            margin-top: 8px;
        }

        .posts-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
        }

        .posts-panel-header .eyebrow {
            margin-bottom: 6px;
            font-size: 12px;
            letter-spacing: 0.12em;
        }

        .posts-panel-title {
            margin: 0;
            color: #1e1b4b;
            font-size: 21px;
            letter-spacing: -0.035em;
        }

        .posts-count {
            display: inline-flex;
            min-width: 36px;
            min-height: 36px;
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
            padding: 16px 18px;
            color: #475569;
            font-size: 14px;
            line-height: 1.65;
            vertical-align: top;
        }

        .posts-table tbody tr + tr td {
            border-top: 1px solid #f1f0f6;
        }

        .posts-table tbody tr:hover {
            background: #fcfbff;
        }

        .posts-table td:first-child {
            color: #64748b;
            font-variant-numeric: tabular-nums;
        }

        .posts-table td:nth-child(2) {
            color: #6d28d9;
            font-variant-numeric: tabular-nums;
        }

        .posts-table td:nth-child(3) {
            min-width: 180px;
            color: #312e81;
            font-weight: 700;
        }

        .posts-table td:last-child {
            min-width: 280px;
            overflow-wrap: anywhere;
        }

        .posts-empty {
            padding: 36px 20px;
            color: #64748b;
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .posts-table {
                min-width: 680px;
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
            <p class="eyebrow">Content library</p>
            <h1>All posts</h1>
            <p class="page-description">Browse posts and the users who created them.</p>
        </div>
    </div>

    <section class="panel posts-panel" aria-labelledby="posts-title">
        <div class="panel-body">
            <div class="posts-panel-header">
                <div>
                    <p class="eyebrow">Posts</p>
                    <h2 class="posts-panel-title" id="posts-title">Post directory</h2>
                </div>
                <span class="posts-count" aria-label="{{ $posts->count() }} posts">
                    {{ $posts->count() }}
                </span>
            </div>

            @if ($posts->isNotEmpty())
                <div class="posts-table-wrap">
                    <table class="posts-table">
                        <thead>
                            <tr>
                                <th scope="col">Post ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="posts-empty">No posts have been added yet.</p>
            @endif
        </div>
    </section>
@endsection
