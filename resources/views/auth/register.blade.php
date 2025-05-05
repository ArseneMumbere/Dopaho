@extends('layouts.app')

@push('styles')
<style>
    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 2rem 0;
    }

    .container {
        max-width: 800px;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.95);
    }

    .card-header {
        background: linear-gradient(45deg, #1a73e8, #289cf5);
        color: white;
        border-radius: 20px 20px 0 0 !important;
        padding: 1.5rem;
    }

    .card-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .card-body {
        padding: 2rem;
    }

    .profile-photo-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #f8f9fa;
        border: 3px solid #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        overflow: hidden;
        position: relative;
    }

    .profile-photo-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-photo-icon {
        font-size: 2.5rem;
        color: #adb5bd;
    }

    .profile-photo-edit-btn {
        position: absolute;
        bottom: 5px;
        right: 5px;
        width: 32px;
        height: 32px;
        background: #1a73e8;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .profile-photo-edit-btn:hover {
        background: #1557b0;
        transform: scale(1.1);
    }

    .profile-photo-edit-btn i {
        color: white;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s;
        background-color: #f8f9fa;
    }

    .form-control:focus {
        border-color: #1a73e8;
        box-shadow: 0 0 0 0.2rem rgba(26, 115, 232, 0.15);
        background-color: #fff;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background-image: none;
    }

    .invalid-feedback {
        font-size: 0.85rem;
        color: #dc3545;
    }

    .btn-primary {
        background: linear-gradient(45deg, #1a73e8, #289cf5);
        border: none;
        border-radius: 10px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26, 115, 232, 0.3);
        background: linear-gradient(45deg, #1557b0, #1a73e8);
    }

    .row {
        margin-left: -10px;
        margin-right: -10px;
    }

    .col-md-6 {
        padding-left: 10px;
        padding-right: 10px;
    }

    .fas {
        color: #1a73e8;
        width: 20px;
        text-align: center;
        margin-right: 8px;
    }

    /* Styles pour les sections de formulaire */
    .form-section .row {
        margin: 0 -0.5rem;
    }

    .form-section .col-md-6 {
        padding: 0 0.5rem;
    }

    #patient-form {
        display: block;
    }
</style>
@endpush

@section('content')
<div class="loading" style="display: none;">
    <div class="loading-spinner"></div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center"><i class="fas fa-user-plus"></i>Créer un compte</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.submit') }}" class="needs-validation" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <div class="profile-photo-circle">
                                    <img id="profile_photo_preview" src="#" alt="" style="display: none;">
                                    <i id="default_photo_icon" class="fas fa-user profile-photo-icon"></i>
                                </div>
                                <label for="profile_photo" class="profile-photo-edit-btn">
                                    <i class="fas fa-camera"></i>
                                    <input type="file" id="profile_photo" name="profile_photo" class="d-none" accept="image/*">
                                </label>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom" class="form-label"><i class="fas fa-user"></i>Nom</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom') }}" required 
                                           placeholder="Votre nom">
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postnom" class="form-label"><i class="fas fa-user"></i>Post-nom</label>
                                    <input type="text" class="form-control @error('postnom') is-invalid @enderror" 
                                           id="postnom" name="postnom" value="{{ old('postnom') }}" required
                                           placeholder="Votre post-nom">
                                    @error('postnom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prenom" class="form-label"><i class="fas fa-user"></i>Prénom</label>
                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                           id="prenom" name="prenom" value="{{ old('prenom') }}" required
                                           placeholder="Votre prénom">
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label"><i class="fas fa-envelope"></i>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required
                                           placeholder="votre.email@exemple.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label"><i class="fas fa-phone"></i>Téléphone</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}" required
                                           placeholder="+XXX XX XXX XXXX">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthdate" class="form-label"><i class="fas fa-calendar"></i>Date de naissance</label>
                                    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" 
                                           id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
                                    @error('birthdate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sexe" class="form-label"><i class="fas fa-venus-mars"></i>Sexe</label>
                                    <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe" required>
                                        <option value="">Choisir...</option>
                                        <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>Masculin</option>
                                        <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>Féminin</option>
                                    </select>
                                    @error('sexe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="poids" class="form-label"><i class="fas fa-weight"></i>Poids (kg)</label>
                                    <input type="number" class="form-control @error('poids') is-invalid @enderror" 
                                           id="poids" name="poids" value="{{ old('poids') }}" step="0.1" min="0" max="300">
                                    @error('poids')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Facultatif</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label"><i class="fas fa-lock"></i>Mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                               id="password" name="password" required
                                               placeholder="Votre mot de passe">
                                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label"><i class="fas fa-lock"></i>Confirmer le mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" 
                                               id="password_confirmation" name="password_confirmation" required
                                               placeholder="Confirmez votre mot de passe">
                                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-user-plus"></i>Créer mon compte
                                </button>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0 text-muted">Déjà inscrit ? <a href="{{ route('login') }}" class="text-primary fw-bold">Se connecter</a></p>
                        </div>
                    </form>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script pour la photo de profil
        const photoInput = document.getElementById('profile_photo');
        const photoPreview = document.getElementById('profile_photo_preview');
        const defaultIcon = document.getElementById('default_photo_icon');

        if (photoInput) {
            photoInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreview.src = e.target.result;
                        photoPreview.style.display = 'block';
                        defaultIcon.style.display = 'none';
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }

        // Script pour afficher/masquer le mot de passe
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Animation du formulaire
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
            if (input.value) {
                input.parentElement.classList.add('focused');
            }
        });
    });
</script>
@endpush
