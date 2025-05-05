@extends('layouts.app')

@section('content')
<!-- Loading Screen -->
<div class="loading" style="display: none;">
    <div class="loading-spinner"></div>
</div>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="text-center mb-0"><i class="fas fa-sign-in-alt me-2"></i>Connexion</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="form-group mb-4">
                            <label for="email" class="form-label"><i class="fas fa-envelope"></i>Adresse email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="votre.email@exemple.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="form-label"><i class="fas fa-lock"></i>Mot de passe</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password"
                                       placeholder="Votre mot de passe">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" 
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                @if (Route::has('password.request'))
                                    <a class="text-primary fw-bold" href="{{ route('password.request') }}">
                                        Mot de passe oublié ?
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-sign-in-alt"></i>Se connecter
                                </button>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0 text-muted">
                                Pas encore de compte ? 
                                <a href="{{ route('register') }}" class="text-primary fw-bold">
                                    Inscrivez-vous
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.loading').style.display = 'none';
    });
</script>
@else
<script>
    document.querySelector('.loading').style.display = 'none';
</script>
@endif

@endsection

@push('scripts')
<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.needs-validation');
        if (form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        }
    });
</script>
@endpush
