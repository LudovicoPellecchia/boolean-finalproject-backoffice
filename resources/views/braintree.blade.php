@extends('layouts.app')

@section('content')
    {{-- ------------ --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4 categories-bg text-center">
                <header class="header">
                    <strong>
                        <h1 class="title">Cyber Security</h1>
                    </strong>

                    <p class="description ps-5 pe-5">
                        Cyber Security è il punto di riferimento per esperti di sicurezza
                        altamente qualificati. I nostri professionisti sono i guardiani
                        digitali che proteggono il tuo mondo virtuale da minacce
                        informatiche. Con competenze avanzate in analisi dei dati,
                        crittografia e difesa cibernetica, ti offrono la tranquillità di
                        navigare in modo sicuro nel vasto mare digitale. Scopri gli esperti
                        di sicurezza di Cyber Sentinel e preparati a essere al sicuro
                        online.
                    </p>
                    <router-link to="/" class="btn">Torna Indietro</router-link>
                </header>

            </div>

            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-6"></div>

                    <div class="col-5">
                        <header class="header text-center">
                            <h2 class="slogan text-end">Esperti di Sicurezza</h2>
                            <h4 class="slogan-font-color text-end mb-5">
                                Il Tuo Scudo Digitale nel Mondo Virtuale
                            </h4>
                            {{-- ------- pagamento------------ --}}
                            <form class="text-end" action="{{ route('form.submit') }}" method="post" id="payment-form">
                                @csrf

                                <label for="sponsor">Sponsor:</label>
                                <select name="sponsor" id="sponsor">
                                    <option value="2.99">2.99$ per 24 ore</option>
                                    <option value="5.99">5.99$ per 72 ore</option>
                                    <option value="9.99">9.99$ per 144 ore</option>
                                </select>

                                <div class="py-12 ">
                                    <div id="dropin-container"
                                        style="display: flex; justify-content: end; align-items: center;"></div>
                                    <div style="display: flex; justify-content: end; align-items: center; color: white">
                                        @if (session('message'))
                                            <div class="alert {{ session('message') === 'Pagamento avvenuto con successo!' ? 'alert-success' : 'alert-danger' }}"
                                                role="alert">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <input type="hidden" name="payment-method-nonce" id="payment-nonce">
                                <button type="submit" class="btn btn-sm btn-success" id="submit-button">Submit
                                    payment</button>
                            </form>
                            {{-- -------fine pagamento ----------- --}}
                        </header>
                    </div>
                </div>

                <div class="row ">

                    <!-- Tabella per le sponsorizzazioni attive -->
                    <div class="col-1"></div>
                    <div class=" col-10 mt-4">
                        <h3>Sponsorizzazioni attive</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Prezzo</th>
                                    <th>Data di Inizio</th>
                                    <th>Data di Scadenza</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activeSponsorships as $sponsorship)
                                    <tr>
                                        <td>{{ $sponsorship->name }}</td>
                                        <td>{{ $sponsorship->price }}</td>
                                        <td>{{ $sponsorship->created_at }}</td>
                                        <td>{{ $sponsorship->end_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>

                <!-- -------------------------------- -->
            </div>
        </div>
    </div>
    {{-- ------------ --}}



    <style>
        .info {
            font-size: 1rem;
            color: #27CDF2;
            font-weight: bold
        }

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

        .categories-bg {
            background-color: rgba(51, 51, 51, 0.9);
            color: #fff;
            height: 100vh;
        }


        /* ----------------------------------------- */
        .title {
            font-size: 4rem;
            color: #27CDF2;

        }

        .description {
            //color: white;
            color: #b0b1b2;
        }

        .slogan {
            color: #27cdf2;
            margin-bottom: 0;
        }

        .slogan h4 {
            margin-top: -1.5rem;
        }

        .slogan-font-color {
            color: #b0b1b2;
        }

        .btn {
            cursor: pointer;
            background-color: rgb(37, 37, 37);
            color: #27cdf2;
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

        /*----- Stile per il contenitore con uno scroll orizzontale -------*/
        .scrolling-container {
            white-space: nowrap;
            /* Evita che le card si spezzino su più righe */
            overflow-x: auto;
            white-space: nowrap;
            margin-top: 5rem;
            margin-left: 2rem;
        }

        .scroll-card {
            height: 350px;
            /* Imposta l'altezza fissa del contenitore */
        }

        .bg-card {
            background-color: rgba(51, 51, 51, 0.5);
            color: #b0b1b2;
        }

        .card-body {

            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .link {
            color: #b0b1b2;
        }

        .link:hover {
            background-color: rgba(51, 51, 51, 0.9);
            padding: 0.5rem;
            padding-left: 2rem;
            padding-right: 2rem;
            border-radius: 8px;
            color: #27CDF2;
        }

        /*---------select--------*/
        .select-bg {
            background-color: rgba(51, 51, 51, 0.5);
            color: rgb(173, 171, 171, );
            border: 1px solid grey;
        }

        .select-color {
            color: #27CDF2;
            background-color: rgba(39, 39, 39, 0.5);
        }

        .bg-select {
            background-color: rgba(51, 51, 51, 0.9);

        }

        option {
            background-color: rgba(85, 84, 84, 0.9);
        }
    </style>

    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
    <script>
        var button = document.querySelector('#submit-button');
        var form = document.querySelector('#payment-form');

        braintree.dropin.create({
            authorization: '{{ $token }}',
            container: '#dropin-container'
        }, function(createErr, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    // Submit payload.nonce to your server
                    document.getElementById('payment-nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
