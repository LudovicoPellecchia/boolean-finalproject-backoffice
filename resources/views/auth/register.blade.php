@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form id="validationForm" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <small id="nameAlert" class="form-text text-muted d-none">
                                            Il campo name è obbligatorio.
                                        </small>
                                    </div>

                                    <small id="nameHelp" class="form-text text-muted">
                                        Inserisci il tuo nome.
                                    </small>

                                </div>

                            </div>

                            {{-- Surname --}}
                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <small id="surnameAlert" class="form-text text-muted d-none">
                                            Il campo name è obbligatorio.
                                        </small>
                                    </div>

                                    <small id="surnameHelp" class="form-text text-muted">
                                        Inserisci il tuo cognome.
                                    </small>

                                </div>

                            </div>

                            {{-- Location --}}
                            <div class="mb-4 row">
                                <label for="location"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Location') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="location" type="text"
                                        class="form-control @error('location') is-invalid @enderror" name="location"
                                        value="{{ old('location') }}">

                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <small id="locationAlert" class="form-text text-muted d-none">
                                            Il campo location è obbligatorio.
                                        </small>
                                    </div>

                                    <small id="locationHelp" class="form-text text-muted">
                                        Inserisci la città in cui risiedi.
                                    </small>

                                </div>
                            </div>

                            {{-- Specialization --}}
                            <div class="mb-4 row">
                                <label for="specializations"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Specializations') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    @foreach ($specializations as $specialization)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="specializations[]"
                                                id="{{ $specialization->id }}" value="{{ $specialization->id }}">
                                            <label class="form-check-label"
                                                for="{{ $specialization->id }}">{{ $specialization->name }}</label>
                                        </div>
                                    @endforeach

                                    @error('specializations')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <small id="specializationsAlert" class="form-text text-muted d-none">
                                            Seleziona almeno una specializzazione.
                                        </small>
                                    </div>

                                    <div>
                                        <small id="specializationsHelp" class="form-text text-muted">
                                            Seleziona almeno una specializzazione.
                                        </small>
                                    </div>

                                </div>

                            </div>

                            {{-- Email --}}
                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label">{{ __('E-Mail Address') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <small id="emailAlert" class="form-text text-muted d-none">
                                            Il campo email è obbligatorio.
                                        </small>
                                    </div>

                                    <small id="emailHelp" class="form-text text-muted">
                                        Inserisci la tua email.
                                    </small>

                                </div>

                            </div>

                            {{-- Password --}}
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <small id="passwordAlert" class="form-text text-muted d-none">
                                            Il campo password è obbligatorio.
                                        </small>
                                        <small id="differentPswAlert" class="form-text text-muted d-none">
                                            Le password non coincidono.
                                        </small>
                                    </div>

                                    <small id="passwordHelp" class="form-text text-muted">
                                        Inserisci la tua password.
                                    </small>

                                </div>

                            </div>

                            {{-- Password Confirmation --}}
                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label">{{ __('Confirm Password') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="confirmedPsw" type="password" class="form-control"
                                        name="password_confirmation">

                                    <div>
                                        <small id="confirmedPswAlert" class="form-text text-muted d-none">
                                            Il campo password è obbligatorio.
                                        </small>
                                        <small id="differentConfirmPswAlert" class="form-text text-muted d-none">
                                            Le password non coincidono.
                                        </small>
                                    </div>

                                    <small id="confirmedPswHelp" class="form-text text-muted">
                                        Inserisci ancora la password.
                                    </small>
                                </div>

                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Il codice js deve essere posizionato dopo l'HTML del form per accedere agli elementi del form.  --}}

<script>
    // Ciò garantisce che il codice js venga eseguito quando il DOM è pronto.
    document.addEventListener('DOMContentLoaded', function() {
        const validationForm = document.getElementById('validationForm');

        validationForm.addEventListener('submit', (e) => {
            e.preventDefault(); // Previeni il refresh della pagina

            if (checkinputs()) {
                validationForm.submit();
            }
        });
    });

    function checkinputs() {

        // Salvo ogni record da validare del form
        const name = document.getElementById("name").value;
        const surname = document.getElementById("surname").value;
        const location = document.getElementById("location").value;
        const specializations = document.querySelectorAll('input[name="specializations[]"]');
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmedPsw = document.getElementById("confirmedPsw").value;

        let isChecked = false;
        let isValid = true;

        //Imposto gli alert per la validazione client-side
        const nameAlert = document.getElementById("nameAlert");
        const surnameAlert = document.getElementById("surnameAlert");
        const locationAlert = document.getElementById("locationAlert");
        const specializationsAlert = document.getElementById("specializationsAlert");
        const emailAlert = document.getElementById("emailAlert");
        const passwordAlert = document.getElementById("passwordAlert");
        const confirmedPswAlert = document.getElementById("confirmedPswAlert");
        const differentPswAlert = document.getElementById("differentPswAlert");
        const differentConfirmPswAlert = document.getElementById("differentConfirmPswAlert");


        // Se la validazione non ha avuto successo, non refreshare la pagina
        if (name.trim() === "") {

            // Faccio comparire il messaggio di errore
            nameAlert.classList.remove("d-none", "text-muted");
            nameAlert.classList.add("text-danger");
            isValid = false;
        } else {
            // Se la validazione è passata, nascondi l'alert
            nameAlert.classList.add("d-none");
            nameAlert.classList.remove("text-danger");
        }

        if (surname.trim() === "") {
            surnameAlert.classList.remove("d-none", "text-muted");
            surnameAlert.classList.add("text-danger");
            isValid = false;
        } else {
            surnameAlert.classList.add("d-none");
            surnameAlert.classList.remove("text-danger");
        }

        if (location.trim() === "") {
            locationAlert.classList.remove("d-none", "text-muted");
            locationAlert.classList.add("text-danger");
            isValid = false;
        } else {
            locationAlert.classList.add("d-none");
            locationAlert.classList.remove("text-danger");
        }

        specializations.forEach((checkbox) => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            specializationsAlert.classList.remove("d-none", "text-muted");
            specializationsAlert.classList.add("text-danger");
            isValid = false;
        } else {
            specializationsAlert.classList.add("d-none");
            specializationsAlert.classList.remove("text-danger");
        }

        if (email.trim() === "") {
            emailAlert.classList.remove("d-none", "text-muted");
            emailAlert.classList.add("text-danger");
            isValid = false;
        } else {
            emailAlert.classList.add("d-none");
            emailAlert.classList.remove("text-danger");
        }

        if (password.trim() === "") {
            passwordAlert.classList.remove("d-none", "text-muted");
            passwordAlert.classList.add("text-danger");
            isValid = false;
        } else {
            passwordAlert.classList.add("d-none");
            passwordAlert.classList.remove("text-danger");
        }

        if (confirmedPsw.trim() === "") {
            confirmedPswAlert.classList.remove("d-none", "text-muted");
            confirmedPswAlert.classList.add("text-danger");
            isValid = false;
        } else {
            confirmedPswAlert.classList.add("d-none");
            confirmedPswAlert.classList.remove("text-danger");
        }

        if (password !== confirmedPsw) {
            differentPswAlert.classList.remove("d-none", "text-muted");
            differentPswAlert.classList.add("text-danger");
            differentConfirmPswAlert.classList.remove("d-none", "text-muted");
            differentConfirmPswAlert.classList.add("text-danger");
            isValid = false;
        } else {
            differentPswAlert.classList.add("d-none");
            differentPswAlert.classList.remove("text-danger");
            differentConfirmPswAlert.classList.add("d-none");
            differentConfirmPswAlert.classList.remove("text-danger");
        }

        return isValid; // Aggiunto questo per restituire il valore corretto


    }
</script>
