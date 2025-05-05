@extends('layouts.patient')

@section('patient_content')
    <div class="page-header">
        <h1>Rendez-vous</h1>
        <p class="lead">Gérez vos rendez-vous médicaux</p>
    </div>

    <div class="row mt-4">
        <!-- Formulaire de prise de rendez-vous -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-calendar-plus me-2"></i>Nouveau rendez-vous
                    </h5>
                    <form method="POST" action="{{ route('patient.appointments.store') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="hospital" class="form-label">
                                        <i class="fas fa-hospital me-2"></i>Hôpital
                                    </label>
                                    <select class="form-control" id="hospital" name="hospital" required>
                                        <option value="">Choisir un hôpital...</option>
                                        <option value="1">Hôpital Central</option>
                                        <option value="2">Clinique Saint-Jean</option>
                                        <option value="3">Hôpital Universitaire</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="medical_record" class="form-label">
                                        <i class="fas fa-file-medical me-2"></i>Numéro de dossier médical
                                    </label>
                                    <input type="text" class="form-control" id="medical_record" name="medical_record" placeholder="Si déjà patient de l'hôpital">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="specialty" class="form-label">
                                        <i class="fas fa-stethoscope me-2"></i>Spécialité demandée
                                    </label>
                                    <select class="form-control" id="specialty" name="specialty" required>
                                        <option value="">Choisir une spécialité...</option>
                                        <option value="general">Médecine générale</option>
                                        <option value="cardio">Cardiologie</option>
                                        <option value="pediatrie">Pédiatrie</option>
                                        <option value="gynecologue">Gynécologie</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="preferred_doctor" class="form-label">
                                        <i class="fas fa-user-md me-2"></i>Médecin souhaité
                                    </label>
                                    <input type="text" class="form-control" id="preferred_doctor" name="preferred_doctor" placeholder="Facultatif">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="date" class="form-label">
                                        <i class="fas fa-calendar-alt me-2"></i>Date
                                    </label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="time" class="form-label">
                                        <i class="fas fa-clock me-2"></i>Heure
                                    </label>
                                    <input type="time" class="form-control" id="time" name="time" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="symptoms" class="form-label">
                                        <i class="fas fa-comment-medical me-2"></i>Symptômes ou motif du rendez-vous
                                    </label>
                                    <textarea class="form-control" id="symptoms" name="symptoms" rows="3" required placeholder="Ex: fièvre, suivi post-op, consultation cardiologique"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="medical_history" class="form-label">
                                        <i class="fas fa-history me-2"></i>Antécédents médicaux importants
                                    </label>
                                    <textarea class="form-control" id="medical_history" name="medical_history" rows="3" placeholder="Facultatif mais recommandé"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="prescription" class="form-label">
                                        <i class="fas fa-prescription me-2"></i>Ordonnance ou recommandation médicale
                                    </label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="prescription" name="prescription">
                                        <label class="input-group-text" for="prescription">Joindre un fichier</label>
                                    </div>
                                    <small class="text-muted">Si envoyé(e) par un autre médecin</small>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-2"></i>Confirmer le rendez-vous
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Liste des rendez-vous -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-calendar-check me-2"></i>Mes rendez-vous
                    </h5>
                    <div class="appointment-list">
                        <!-- Rendez-vous à venir -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="fas fa-calendar-day me-2"></i>À venir
                            </h6>
                            <div class="appointment-item upcoming">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-2">Hôpital Général de Kinshasa</h6>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                            <span>15 Mai 2025 à 14:30</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user-md me-2 text-primary"></i>
                                            <span>Dr. Martin</span>
                                        </div>
                                    </div>
                                    <span class="appointment-status status-upcoming">À venir</span>
                                </div>
                                <div class="mt-3 pt-3 border-top">
                                    <p class="text-muted mb-0"><i class="fas fa-comment-medical me-2"></i>Consultation générale</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h6 class="text-muted fw-bold mb-3">
                                <i class="fas fa-history me-2"></i>Passés
                            </h6>
                            <div class="appointment-item past">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-2">Clinique Ngaliema</h6>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar-alt me-2 text-muted"></i>
                                            <span>10 Avril 2025 à 09:00</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user-md me-2 text-muted"></i>
                                            <span>Dr. Dubois</span>
                                        </div>
                                    </div>
                                    <span class="appointment-status status-completed">Terminé</span>
                                </div>
                                <div class="mt-3 pt-3 border-top">
                                    <p class="text-muted mb-0"><i class="fas fa-comment-medical me-2"></i>Contrôle annuel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Validation du formulaire
    (function() {
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
    })();
</script>
@endpush
