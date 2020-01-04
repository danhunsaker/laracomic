@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @unless (collect(config('services'))->filter(function ($service) {
                        return array_get($service, 'client_id');
                    })->isEmpty())
                        <div class="text-center social-btn">
                            @if (config('services.deviantart.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'deviantart']) }}" class="btn"><i class="fab fa-deviantart mr-1"></i> Sign in with <b>deviantArt</b></a>
                            @endif
                            @if (config('services.discord.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'discord']) }}" class="btn"><i class="fab fa-discord mr-1"></i> Sign in with <b>Discord</b></a>
                            @endif
                            @if (config('services.facebook.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn"><i class="fab fa-facebook mr-1"></i> Sign in with <b>Facebook</b></a>
                            @endif
                            @if (config('services.google.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn"><i class="fab fa-google mr-1"></i> Sign in with <b>Google</b></a>
                            @endif
                            @if (config('services.instagram.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'instagram']) }}" class="btn"><i class="fab fa-instagram mr-1"></i> Sign in with <b>Instagram</b></a>
                            @endif
                            @if (config('services.live.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'live']) }}" class="btn"><i class="fab fa-microsoft mr-1"></i> Sign in with <b>Microsoft</b></a>
                            @endif
                            @if (config('services.patreon.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'patreon']) }}" class="btn"><i class="fab fa-patreon mr-1"></i> Sign in with <b>Patreon</b></a>
                            @endif
                            @if (config('services.pinterest.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'pinterest']) }}" class="btn"><i class="fab fa-pinterest mr-1"></i> Sign in with <b>Pinterest</b></a>
                            @endif
                            @if (config('services.reddit.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'reddit']) }}" class="btn"><i class="fab fa-reddit mr-1"></i> Sign in with <b>Reddit</b></a>
                            @endif
                            @if (config('services.tumblr.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'tumblr']) }}" class="btn"><i class="fab fa-tumblr mr-1"></i> Sign in with <b>Tumblr</b></a>
                            @endif
                            @if (config('services.twitter.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn"><i class="fab fa-twitter mr-1"></i> Sign in with <b>Twitter</b></a>
                            @endif
                            @if (config('services.yahoo.client_id'))
                                <a href="{{ route('social.login', ['provider' => 'yahoo']) }}" class="btn"><i class="fab fa-yahoo mr-1"></i> Sign in with <b>Yahoo</b></a>
                            @endif
                        </div>

                        <div class="or-separator">
                            <i>or</i>
                        </div>
                    @endunless

                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
