@extends('layouts.app')

@section('title', 'Edit ' . $user->name . ' | People Portal')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Members</p>
            <h1>Edit user details</h1>
            <p class="page-description">Update {{ $user->name }}’s information in your people directory.</p>
        </div>
        <a class="button button-secondary" href="{{ route('user.index') }}">Back to users</a>
    </div>

    <section class="panel" aria-label="Edit user form">
        <div class="panel-body">
            <form action="{{ route('user.update', $user->id) }}" method="post" class="form-stack">
                @csrf
                @method('PUT')

                <div>
                    <label class="field-label" for="name">Full name</label>
                    <input
                        class="field-input"
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $user->name) }}"
                        placeholder="Enter their name"
                        autocomplete="name"
                        required
                    >
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="field-label" for="email">Email</label>
                    <input
                        class="field-input"
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $user->email) }}"
                        placeholder="Email"
                        autocomplete="email"
                        required
                    >
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="field-label" for="password">New password <span>(optional)</span></label>
                    <input
                        class="field-input"
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Leave blank to keep the current password"
                        autocomplete="new-password"
                    >
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button class="button" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </section>
@endsection
