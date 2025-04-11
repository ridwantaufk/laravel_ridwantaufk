<style>
    body {
        background: #f0f4ff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        color: #444;
    }

    .neumorphic-card {
        background: #f0f4ff;
        border-radius: 20px;
        box-shadow: 8px 8px 20px #d1d9e6, -8px -8px 20px #ffffff;
        padding: 2rem;
        width: 100%;
        max-width: 400px;
    }

    .neumorphic-input {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        border: none;
        margin-top: 6px;
        background: #f0f4ff;
        color: #444;
        box-shadow: inset 3px 3px 6px #d1d9e6, inset -3px -3px 6px #ffffff;
        transition: 0.3s ease;
    }

    .neumorphic-input::placeholder {
        color: #888;
    }

    .neumorphic-input:focus {
        outline: none;
        box-shadow: inset 2px 2px 4px #d1d9e6, inset -2px -2px 4px #ffffff, 0 0 0 2px #6366f1;
    }

    .neumorphic-btn {
        background: #f0f4ff;
        color: #6366f1;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        box-shadow: 6px 6px 12px #c9d0e3, -6px -6px 12px #ffffff;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.25s ease-in-out;
    }

    .neumorphic-btn:hover {
        box-shadow: 2px 2px 6px #c9d0e3, -2px -2px 6px #ffffff;
        color: #4f46e5;
    }

    .neumorphic-btn:active {
        box-shadow: inset 3px 3px 6px #c9d0e3, inset -3px -3px 6px #ffffff;
        transform: scale(0.97);
        color: #4338ca;
    }


    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
    }

    a {
        color: #6b7280;
        font-size: 0.85rem;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    label {
        font-size: 0.92rem;
        font-weight: 500;
        color: #444;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        font-size: 0.85rem;
        color: #555;
    }

    .checkbox-label input {
        accent-color: #6366f1;
        margin-right: 0.5rem;
    }
</style>

<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="neumorphic-card">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div class="form-group">
            <label for="username">{{ __('Username') }}</label>
            <input id="username" class="neumorphic-input" type="text" name="username" value="{{ old('username') }}"
                placeholder="Masukkan username" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="neumorphic-input" type="password" name="password" placeholder="••••••••"
                required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="remember">
                {{ __('Ingatkan Saya') }}
            </label>
        </div> --}}

        <div class="form-footer">
            <a href="{{ route('register') }}">{{ __('Belum punya akun? Daftar') }}</a>
            <button type="submit" class="neumorphic-btn">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
