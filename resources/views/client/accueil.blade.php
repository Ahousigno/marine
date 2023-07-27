@extends("layouts.client_layout")



@section("contenu")
<?php $nav = "accueil" ?>
<div class="content bg-light">
    <div style="background-image: url({{asset('/client/assets/img/banniere.jpg')}});" class="banner">
        <div class="overlay container-fluid mt-2">
            <h2 class="text">
                Direction de la Police Maritime et de la Logistique Navale </h2>
            <h3 class="text2">Plateforme de gestion du personnel</h3>
        </div>
    </div>
</div>
<br>



@endsection