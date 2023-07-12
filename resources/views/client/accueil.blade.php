@extends("layouts.client_layout")



@section("contenu")
<?php $nav = "accueil" ?>
<div class="content bg-light">
    <div style="background-image: url({{asset('/client/assets/img/banniere.jpg')}});" class="banner">
        <div class="overlay container-fluid mt-2">
            <h2 class="text">
                Direction de la Police Maritime et de la Logistique Navale </h2>
            <h3 class="text2">Plateforme de gestion des officiers</h3>
        </div>
    </div>
</div>
<br>
<!-- <div class="container text-center">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mt-4 mb-4">
        <div class="col">
            <div class="card mb-3" style="width: 17rem; min-height:350px">
                <img src="{{asset('client/assets/img/service/communication.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Service Communication</h5>
                    <p class="card-text">En charge de la supervision de l'évènement.</p>
                    <a href="#" class="btn btn-primary" id="btn">Communication</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3" style="width: 17rem; min-height:350px">
                <img src="{{asset('client/assets/img/service/media.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Service Média</h5>
                    <p class="card-text">En charge de la Création des visuels.</p>
                    <a href="#" class="btn btn-primary" id="btn">Media</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 17rem; min-height:350px">
                <img src="{{asset('client/assets/img/service/logistique.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Service Logistique</h5>
                    <p class="card-text">En charge de la disponibilité des salles.</p>
                    <a href="#" class="btn btn-primary" id="btn">Logistique</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 17rem; min-height:350px">
                <img src="{{asset('client/assets/img/service/secretariat.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Service Secrétariat</h5>
                    <p class="card-text">En charge de l'envoie des courriers de l'évènement.</p>
                    <a href="#" class="btn btn-primary" id="btn">Secretariat</a>
                </div>
            </div>
        </div>
    </div>
</div> -->


@endsection