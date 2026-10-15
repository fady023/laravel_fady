@extends('layouts.app')

@section('title', 'Create user | People Portal')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Members</p>
            <h1>Create a new user</h1>
            <p class="page-description">Add someone new to your people directory.</p>
        </div>
    </div>

    <section class="panel" aria-label="Create user form">
        <div class="panel-body">
            <form action="{{ route('user.store') }}" method="post" class="form-stack">
                @csrf

                <div>
                    <label class="field-label" for="name">Full name</label>
                    <input
                        class="field-input"
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        placeholder="Enter their name"
                        autocomplete="name"
                        required
                    >
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="field-label" for="age">Age</label>
                    <input
                        class="field-input"
                        id="age"
                        name="age"
                        type="number"
                        min="0"
                        value="{{ old('age') }}"
                        placeholder="Enter their age"
                        required
                    >
                    @error('age')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button class="button" type="submit">Create user</button>
                </div>
            </form>
        </div>
    </section>
@endsection
