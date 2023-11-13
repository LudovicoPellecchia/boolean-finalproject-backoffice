@extends('layouts.app')


@section('content')
    <div class="container-fluid ">

    </div>
    <div class="row ">
        <div class="col-lg-4 col-12 categories-bg ">
            <h2 class="username text-center">Amani Esseili</h2>

            <div class="col-md-12">
                <div class="card-body  ">
                    <p class="description text-justify"> Benvenuto nella pagina dei Dettagli del tuo Profilo. Questo spazio è
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
                                    <div>
                                        <strong>Photo:</strong>
                                        <img class="card-img-top" src="{{ asset('storage/' . $profile->photo) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body ">
                                        <h2 class="mb-5 title">Profile Details</h2>

                                        <div>
                                            <strong>Phone:</strong> {{ $profile->phone }}
                                        </div>
                                        <div>
                                            <strong>Location:</strong> {{ $profile->location }}
                                        </div>
                                        <div>
                                            <strong>Specializations:</strong>
                                            @foreach ($userSpecializations as $specialization)
                                                {{ $specialization->name }}
                                            @endforeach
                                        </div>

                                        <div>
                                            <strong>Description:</strong> {{ $profile->description }}
                                        </div>
                                        <div>
                                            <strong>Skills:</strong> {{ $profile->skills }}
                                        </div>
                                        <div>
                                            <strong>Curriculum:</strong> {{ $profile->curriculum }}
                                        </div>
                                        <div>
                                            <strong>Visible:</strong> {{ $profile->visible ? 'Yes' : 'No' }}
                                        </div>
                                        {{-- ----------- modifica e cancella ---------- --}}
                                        <div class="d-flex">

                                            <div class="mb-3 me-3 mt-5">
                                                <a href="{{ route('user.edit', $profile->id) }}" class="btn">Modifica</a>
                                            </div>

                                            <form action="{{ route('user.destroy', $profile->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn mt-5"
                                                    onclick="return confirm('Sei sicuro di voler eliminare questo utente?')">Cancella</button>
                                            </form>

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
            background-image: url(/bg-2.jpg);
            background-size: cover;
            background-attachment: fixed; //fissa il bg-img per evitare lo scrolling
            background-repeat: no-repeat;
        }

        /* aggiunge un overlay trasparente all'immagine di sfondo */
        body::before {
            content: "";
            background: rgba(173, 171, 171, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* Posiziona l'overlay dietro all'immagine di sfondo */
        }

        .my-bg {
            background-color: rgba(173, 171, 171, 0.3);
            width: 100%;
        }

        .title {
            font-size: 3rem;
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
            background-color: rgba(51, 51, 51, 0.9);
            color: #fff;
            height: 100vh;
        }



        .btn {
            cursor: pointer;
            background-color: rgb(37, 37, 37);
            color: #27CDF2;
            padding: 10px 20px;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            border-radius: 15px;
            text-align: center;
            padding: 8px 10px;
            width: 15rem;
        }

        .btn:hover {
            background-color: #6d7074;
        }
    </style>
@endsection
