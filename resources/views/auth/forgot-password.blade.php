@extends('layouts.app')

@section('content')
{{-- ------------- --}}
<div class="container-fluid ">

</div>
<div class="row ">
    <div class="col-lg-4 col-12 categories-bg ">
        <h2 class="username text-center">Recupera Password</h2>

        <div class="col-md-12">
            <div class="card-body  ">
                <p class="description text-justify"> Ciao! Benvenuto nella pagina di recupero password. Qui puoi reimpostare la tua password se l'hai dimenticata. Per iniziare, inserisci il tuo indirizzo email registrato e ti invieremo istruzioni su come procedere con il recupero della password. Assicurati di utilizzare l'indirizzo email associato al tuo account.</p>

            </div>
        </div>


    </div>


    <div class="col-lg-8 col-12 ">
            <div class="row justify-content-center">
                <div class="col-md-10 mt-3">
                    <h4 class="mb-5 title" >Riemposta la tua Password</h4>
                    <!-- bootstrap card -->
                    {{-- ------------------- --}}
                    <div class="bg-custom">
                        <div class="card-header info mb-4">{{ __('Reset Password') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="mb-4 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right info">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Inserisci la tua Password" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mb-4 row mb-0 mt-5">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    {{-- ------------------- --}}
                </div>
            </div>
    </div>
</div>
</div>
</div>

{{-- ------------- --}}

{{-- css --}}

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
        font-size: 2rem;
        color: #27CDF2;

    }

    .info{
    font-size: 1rem;
    color: #27CDF2;
    font-weight: bold

}

    .username {
        font-size: 4rem;
        color: #27CDF2;

    }

    .description {
        color: #b0b1b2;
        padding: 2rem
    }

     .bg-custom{
        background-color: rgba(51, 51, 51, 0.5);
        border-color: rgba(51, 51, 51, 0.5);
        padding: 2rem;
        border-radius: 8px;
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
