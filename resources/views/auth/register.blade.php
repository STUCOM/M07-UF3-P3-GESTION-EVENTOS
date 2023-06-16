@extends('layouts.app')

@section('content')
<div>
    <div>
        <div>
            <div>
                <div>{{ __('Register') }}</div>

                <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <label for="name">{{ __('Name') }}</label>

                            <div>
                                <input id="name" type="text"  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email">{{ __('Email Address') }}</label>

                            <div>
                                <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
