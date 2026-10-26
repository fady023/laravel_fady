@extends("layouts.app")


@section("content")

    <div class="page-heading">
        <div>
            <h1>Login</h1>
        </div>
    </div>

<section class="panel" aria-label="login form">
        <div class="panel-body">
            <form action="{{ route('login.authenticate') }}" method="post" class="form-stack">
                @csrf

                <div>
                    <label class="field-label" for="mail">Email</label>
                    <input
                        class="field-input"
                        id="mail"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="Email"
                        required
                    >
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                     <div>
                    <label class="field-label" for="pass">password</label>
                    <input
                        class="field-input"
                        id="pass"
                        name="password"
                        type="password"
                        value="{{ old('password') }}"
                        placeholder="Password"
                        required
                    >
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button class="button" type="submit">login</button>
                </div>
            </form>
        </div>
    </section>


@endsection