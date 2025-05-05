@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">Tableau de bord Médecin</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Rendez-vous</h5>
                                    <p class="card-text">Gérez vos rendez-vous avec les patients</p>
                                    <a href="#" class="btn btn-primary">Voir les rendez-vous</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Patients</h5>
                                    <p class="card-text">Liste de vos patients et leurs dossiers</p>
                                    <a href="#" class="btn btn-primary">Voir les patients</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Disponibilités</h5>
                                    <p class="card-text">Gérez vos horaires de consultation</p>
                                    <a href="#" class="btn btn-primary">Gérer les disponibilités</a>
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
