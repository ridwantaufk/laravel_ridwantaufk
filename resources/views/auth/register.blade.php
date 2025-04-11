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
        max-width: 450px;
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
        border-radius: 14px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        box-shadow:
            9px 9px 18px #c0c8db,
            -9px -9px 18px #ffffff,
            inset 0 0 0 transparent;
        transition: all 0.2s ease-in-out;
    }

    .neumorphic-btn:hover {
        box-shadow:
            6px 6px 12px #c0c8db,
            -6px -6px 12px #ffffff,
            inset 0 0 0 transparent;
        color: #4f46e5;
        transform: translateY(-1px);
    }

    .neumorphic-btn:active {
        box-shadow:
            inset 4px 4px 8px #c0c8db,
            inset -4px -4px 8px #ffffff;
        transform: scale(0.96);
        color: #4338ca;
    }


    .form-group {
        margin-bottom: 1.2rem;
    }

    label {
        font-size: 0.92rem;
        font-weight: 500;
        color: #444;
    }

    a {
        color: #6b7280;
        font-size: 0.85rem;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .form-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
    }
</style>

<div class="neumorphic-card">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" class="neumorphic-input" type="text" name="name" value="{{ old('name') }}"
                placeholder="Nama lengkap" required autofocus autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username">{{ __('Username') }}</label>
            <input id="username" class="neumorphic-input" type="text" name="username" value="{{ old('username') }}"
                placeholder="Username" required autocomplete="username">
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="neumorphic-input" type="password" name="password" placeholder="••••••••"
                required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="neumorphic-input" type="password" name="password_confirmation"
                placeholder="Ulangi password" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="form-footer">
            <a href="{{ route('login') }}">{{ __('Sudah daftar ? Login') }}</a>
            <button type="submit" class="neumorphic-btn">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
