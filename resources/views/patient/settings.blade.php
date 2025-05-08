@extends('layouts.patient')

@section('patient_content')
<div class="page-header">
    <h1>Paramètres</h1>
    <p class="lead">Gérez vos paramètres</p>
</div>
<div class="container py-4">
    <div class="row mb-4">
        <!-- Section Profil et Photo -->
        <div class="col-md-7">
            <div class="card h-100">
                <div class="card-body">
                    <div class="section-title d-flex align-items-center mb-4">
                        <div class="position-relative me-4">
                            <form id="photoForm" action="{{ route('patient.photo.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="photoInput" name="photo" class="d-none" accept="image/*">
                                <div class="position-relative" style="width: 120px; height: 120px;">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->nom . ' ' . Auth::user()->prenom) }}" 
                                         alt="Photo de profil"
                                         class="rounded-circle w-100 h-100 object-fit-cover shadow"
                                         id="previewPhoto">
                                    <button type="button" class="btn btn-primary btn-sm position-absolute bottom-0 end-0 rounded-circle p-2"
                                            onclick="document.getElementById('photoInput').click()">
                                        <i class="fas fa-camera"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div>
                            <h5 class="mb-1">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h5>
                            <p class="text-muted mb-0">Votre profil médical</p>
                        </div>
                    </div>

                    <!-- Informations Personnelles -->
                    <div class="medical-info-section mb-4">
                        <h6 class="text-primary mb-3"><i class="fas fa-user-circle me-2"></i>Informations Personnelles</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="text-muted">Nom complet</label>
                                    <p class="mb-2">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="text-muted">Email</label>
                                    <p class="mb-2">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="text-muted">Téléphone</label>
                                    <p class="mb-2">{{ Auth::user()->telephone ?? 'Non renseigné' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="text-muted">Date de naissance</label>
                                    <p class="mb-2">{{ Auth::user()->birthdate ? Auth::user()->birthdate->format('d/m/Y') : 'Non renseigné' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Sécurité -->
        <div class="col-md-5">
            <div class="card h-100">
                <div class="card-body">
                    <div class="section-title">
                        <h5><i class="fas fa-shield-alt me-2"></i>Sécurité</h5>
                        <p class="text-muted">Modifiez votre mot de passe</p>
                    </div>
                    <form method="POST" action="{{ route('patient.password.update') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="current_password" class="form-label">
                                <i class="fas fa-lock me-2"></i>Mot de passe actuel
                            </label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                   id="current_password" name="current_password" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-key me-2"></i>Nouveau mot de passe
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-check-double me-2"></i>Confirmer le mot de passe
                            </label>
                            <input type="password" class="form-control"
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key me-2"></i>Changer le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Notifications -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="section-title">
                        <h5><i class="fas fa-bell me-2"></i>Notifications</h5>
                        <p class="text-muted">Gérez vos préférences de notifications</p>
                    </div>
                    <div class="notification-list">
                        <div class="notification-item">
                            <div class="d-flex align-items-center">
                                <div class="notification-icon me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="notification-content flex-grow-1">
                                    <h6 class="mb-1">Notifications par email</h6>
                                    <p class="text-muted mb-0">Recevez des notifications par email pour vos rendez-vous et mises à jour importantes.</p>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="emailNotifications" name="email_notifications" {{ old('email_notifications', auth()->user()->email_notifications) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="emailNotifications"></label>
                                </div>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="d-flex align-items-center">
                                <div class="notification-icon me-3">
                                    <i class="fas fa-sms"></i>
                                </div>
                                <div class="notification-content flex-grow-1">
                                    <h6 class="mb-1">Notifications par SMS</h6>
                                    <p class="text-muted mb-0">Recevez des rappels par SMS pour vos rendez-vous à venir.</p>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="smsNotifications" name="sms_notifications" {{ old('sms_notifications', auth()->user()->sms_notifications) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="smsNotifications"></label>
                                </div>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="d-flex align-items-center">
                                <div class="notification-icon me-3">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="notification-content flex-grow-1">
                                    <h6 class="mb-1">Rappels de rendez-vous</h6>
                                    <p class="text-muted mb-0">Recevez des rappels avant vos rendez-vous médicaux.</p>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="appointmentReminders" name="appointment_reminders" {{ old('appointment_reminders', auth()->user()->appointment_reminders) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="appointmentReminders"></label>
                                </div>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="d-flex align-items-center">
                                <div class="notification-icon me-3">
                                    <i class="fas fa-gift"></i>
                                </div>
                                <div class="notification-content flex-grow-1">
                                    <h6 class="mb-1">Offres spéciales</h6>
                                    <p class="text-muted mb-0">Recevez des offres spéciales et des mises à jour sur nos services.</p>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="marketingNotifications" name="marketing_notifications" {{ old('marketing_notifications', auth()->user()->marketing_notifications) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="marketingNotifications"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Enregistrer les préférences
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('photoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        // Afficher un aperçu de l'image
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewPhoto').src = e.target.result;
        }
        reader.readAsDataURL(file);

        // Envoyer la photo au serveur
        const formData = new FormData();
        formData.append('photo', file);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ route("patient.photo.update") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mettre à jour l'image avec l'URL retournée par le serveur
                document.getElementById('previewPhoto').src = data.photo_url;
                // Afficher un message de succès
                alert(data.message);
            } else {
                alert('Erreur lors de la mise à jour de la photo');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert('Une erreur est survenue lors de la mise à jour de la photo');
        });
    }
});

    document.addEventListener('DOMContentLoaded', function() {
        // Ajouter le champ _method pour simuler PUT
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'PUT';
                this.appendChild(methodField);
            });
        });

        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    });
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
