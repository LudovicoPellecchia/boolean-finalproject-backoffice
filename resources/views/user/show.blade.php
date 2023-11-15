@extends('layouts.app')


@section('content')
<div class="container-fluid ">

</div>
<div class="row ">
    <div class="col-lg-4 col-12 categories-bg mt-3 ">
        <h2 class="username text-center">{{ $profile->user->name }} {{ $profile->user->surname }}</h2>
        <div class="col-md-12">
            <div class="card-body">
                <p class="col-12 description text-justify"> Benvenuto nella pagina dei Dettagli del tuo Profilo. Questo
                    spazio
                    è
                    dedicato alla gestione delle vostre
                    informazioni personali. Avete il controllo completo sul vostro profilo e potete apportare modifiche
                    in
                    qualsiasi momento. La nostra piattaforma è progettata per offrire un'esperienza personalizzata e per
                    mettere
                    a vostra disposizione gli strumenti necessari per mantenere il vostro profilo sempre aggiornato
                    secondo le
                    vostre preferenze. Inoltre, se desiderate eliminare il vostro profilo, potete farlo con semplicità.
                    Siamo a
                    vostra disposizione per fornirvi assistenza e garantirvi una gestione del profilo agevole e
                    piacevole</p>

            </div>
        </div>


    </div>


    <div class="col-lg-8 col-12 ">

        <div class="container pt-5 ">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <!-- bootstrap card -->
                    {{-- ------------------- --}}
                    <div class="card my-bg mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="profile-photo p-3">
                                    <img class="card-img-top text-center"
                                        src="{{ asset('storage/' . $profile->photo) }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body ps-5">
                                    <h2 class="mb-5 title">Profile Details</h2>
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li class="color-site fs-4"><strong>Telefono:</strong></li>
                                            <h5>{{ $profile->phone }}</h5>


                                            <li class="color-site fs-4"><strong>Posizione:</strong></li>
                                            <h5>{{ $profile->location }}</h5>

                                            <li class="color-site fs-4"><strong>Specializzazioni:</strong></li>
                                            <h5>
                                                @foreach ($userSpecializations as $specialization)
                                                {{ $specialization->name }}
                                                @endforeach
                                            </h5>
                                            </p>

                                            <li class="color-site fs-4"><strong>Descrizione:</strong></li>
                                            <h5>{{ $profile->description }}</h5>

                                            <li class="color-site fs-4"><strong>Competenze:</strong></li>
                                            <h5>{{ $profile->skills }}</h5>

                                        </ul>

                                    </div>


                                    {{-- ----------- modifica e cancella ---------- --}}

                                    <div class="row text-center pt-5 gap-4">
                                        <div class="col-12 col-lg-5">
                                            <a href="{{ route('user.edit', $profile->id) }}"
                                                class="btn btn-primary ps-5 pe-5 pt-2 pb-2">Modifica</a>
                                        </div>

                                        <div class="col-12 col-lg-5">
                                            <form action="{{ route('user.destroy', $profile->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary ps-5 pe-5 pt-2 pb-2"
                                                    onclick="return confirm('Sei sicuro di voler eliminare questo utente?')">Cancella</button>
                                            </form>
                                        </div>




                                    </div>
                                    {{-- --------------------------------------- --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    body {
        background-image: url(/cybersbg.jpg);
        background-size: auto;
        background-repeat: no-repeat;
        overflow-x: hidden;

    }


    .my-bg {
        background-color: rgba(173, 171, 171, 0.5);
        width: 100%;
    }

    .title {
        font-size: 3rem;
        color: #27CDF2;

    }

    .color-site {
        color: #27CDF2;
    }

    .username {
        font-size: 4rem;
        color: #27CDF2;

    }

    .description {
        color: #b0b1b2;
        padding: 2rem
    }


    .categories-bg {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-color: rgba(51, 51, 51, 0.781);
        border-top-right-radius: 40px;
        color: #fff;
    }

    .profile-photo {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
    }

    .profile-photo img {
        object-fit: cover;

        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        border-radius: 50%;
        aspect-ratio: 1/1
    }

    .btn {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        cursor: pointer;
        background-color: rgb(37, 37, 37);
        color: #27CDF2;
        font-size: 1.2rem;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        border-radius: 15px;
        text-align: center;
    }

    .btn:hover {
        background-color: #6d7074;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-color: rgba(51, 51, 51, 0.6);
        border-radius: 10px;
        color: #b0b1b2;
    }
</style>
@endsection