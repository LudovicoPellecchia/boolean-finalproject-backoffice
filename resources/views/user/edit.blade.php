@extends('layouts.app')

@section('content')
{{-- ------------------- --}}

<div class="container ">
    <div class="row justify-content-center ">


        <h1 class="text-center mt-4" style="color: #27CDF2">Completa il tuo profilo</h1>

        <div class="col-lg-8 bg-form mt-4">

            <div class=" pt-2 ">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <!-- bootstrap form -->
                        <form id="validationForm" action="{{ route('user.update', ['user' => $profile->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            {{-- Photo --}}
                            <div class="form-group mb-2">

                                <label for="photo" class="form-label info">Photo<span class="info"> * </span>:</label>
                                @if ($profile->photo)
                                <img src="{{ asset('/storage/' . $profile->photo) }}" alt=""
                                    class="img-fluid border border-danger my-2 p-1" style="width: 100px">
                                @endif
                                <input type="file" accept="image/*"
                                    class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">

                                @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <small id="photoHelp" class="form-text text-light">
                                    Carica un'immagine per il tuo profilo in formato jpeg, png, jpg.
                                </small>

                            </div>

                            {{-- Phone --}}
                            <div class="form-group mb-1 ">
                                <label for="phone" class="form-label info">Phone<span class="info"> * </span>:</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    placeholder="es. 1234567891" name="phone" value="{{ $profile->phone }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div>
                                    <small id="phoneAlert" class="form-text text-muted d-none">
                                        Il campo phone è obbligatorio.
                                    </small>
                                </div>

                                <small id="phoneHelp" class="form-text text-light">
                                    Inserisci il tuo numero di telefono.
                                </small>

                            </div>

                            {{-- Location --}}
                            <div class="form-group mb-1">

                                <label for="location" class="form-label info">Location<span class="info"> *
                                    </span>:</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    id="location" placeholder="Inserisci la città in vui vivi attualmente"
                                    name="location" value="{{ $profile->location }}">

                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div>
                                    <small id="locationAlert" class="form-text text-muted d-none">
                                        Il campo location è obbligatorio.
                                    </small>
                                </div>

                                <small id="locationHelp" class="form-text text-light">
                                    Inserisci la città in cui risiedi.
                                </small>

                            </div>
                            {{-- Skills --}}
                            <div class="form-group mb-1">

                                <label for="skills" class="form-label info">Prestazioni<span class="info"> * </span>:</label>
                                <input type="text" class="form-control  @error('skills') is-invalid @enderror"
                                    id="skills" placeholder="Inserisci le tue competenze" name="skills"
                                    value="{{ $profile->skills }}">

                                @error('skills')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div>
                                    <small id="skillsAlert" class="form-text text-muted d-none">
                                        Il campo skills è obbligatorio
                                    </small>
                                </div>

                                <small id="skillsHelp" class="form-text text-light">
                                    Descrivi brevemente quali sono le tue competenze.
                                </small>

                            </div>
                            {{-- Curriculum --}}
                            <div class="form-group mb-1">

                                <label for="curriculum" class="form-label info">Curriculum<span></span>:</label>
                                <input type="file" class="form-control @error('curriculum') is-invalid @enderror"
                                    name="curriculum">

                                @error('curriculum')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <small id="curriculumHelp" class="form-text text-light">
                                    Carica il tuo curriculum vitae in formato pdf.
                                </small>

                            </div>
                            {{-- Visible --}}
                            <div class="form-group mb-1">

                                <label for="visible" class="form-label info">Visible<span></span>:</label>
                                <select type="select" class="form-select @error('visible') is-invalid @enderror"
                                    id="visible" name="visible" value="{{ $profile->visible }}">
                                    <option value="1" {{ $profile->visible == 1 ? 'selected' : '' }}>Si</option>
                                    <option value="0" {{ $profile->visible == 0 ? 'selected' : '' }}>No</option>
                                </select>

                            </div>
                            {{-- Description --}}
                            <div class="form-group mb-1">

                                <label for="description" class="form-label info">Description:</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" placeholder="Inserisci una tua breve descrizione"
                                    name="description">{{ $profile->description }}</textarea>

                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <small id="descriptionHelp" class="form-text text-light">
                                    Raccontaci di te per raggiungere più utenti.La descrizione non deve superare i 500
                                    caratteri (spazi
                                    compresi).
                                </small>

                            </div>
                            {{-- Specializations --}}
                            <div class="form-group mb-2 specialization-bg">
                                <label for="specializations" class="info">Specializations<span class="info"> * </span>:
                                </label>

                                @foreach ($specializations as $specialization)
                                <input class="form-check-input @error('description') is-invalid @enderror"
                                    type="checkbox" name="specializations[]" id="{{ $specialization->id }}"
                                    value="{{ $specialization->id }}" {{
                                    $userSpecializations?->contains($specialization) ?
                                'checked' : '' }}>
                                <label class="form-check-label" for="{{ $specialization->id }}">{{ $specialization->name
                                    }}</label>
                                @endforeach

                                @error('specializations')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div>
                                    <small id="specializationsAlert" class="form-text text-muted d-none ">
                                        Seleziona almeno una specializzazione.
                                    </small>
                                </div>

                                <div>
                                    <small id="locationHelp" class="form-text text-light">
                                        Inserisci almeno una specializzazione.
                                    </small>
                                </div>

                            </div>

                            {{-- Button --}}
                            <div class="pt-1 pb-2 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">CONFERMA</button>
                            </div>

                        </form>

                        {{-- Il codice js deve essere posizionato dopo l'HTML del form per accedere agli elementi del
                        form.
                        --}}
                        {{-- ------------------- --}}

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

</div>
@endsection

<script>
    // Ciò garantisce che il codice js venga eseguito quando il DOM è pronto.
    document.addEventListener('DOMContentLoaded', function() {

        validationForm.addEventListener('submit', (e) => {
            e.preventDefault(); // Previeni il refresh della pagina

            if (checkinputs()) {
                validationForm.submit();
            }
        });

        function checkinputs() {

            // Salvo ogni record da validare del form
            const phone = document.getElementById("phone").value;
            const location = document.getElementById("location").value;
            const skills = document.getElementById("skills").value;
            const specializations = document.querySelectorAll('input[name="specializations[]"]');
            let isChecked = false;
            let isValid = true;

            //Imposto gli alert per la validazione client-side
            const phoneAlert = document.getElementById("phoneAlert");
            const locationAlert = document.getElementById("locationAlert");
            const skillsAlert = document.getElementById("skillsAlert");
            const specializationsAlert = document.getElementById("specializationsAlert");


            // Se la validazione non ha avuto successo, non refreshare la pagina
            if (phone.trim() === "") {
                // Faccio comparire il messaggio di errore
                phoneAlert.classList.remove("d-none", "text-muted");
                phoneAlert.classList.add("text-danger");
                isValid = false;
            } else {
                // Se la validazione è passata, nascondi l'alert
                phoneAlert.classList.add("d-none");
                phoneAlert.classList.remove("text-danger");
            }

            if (location.trim() === "") {
                locationAlert.classList.remove("d-none", "text-muted");
                locationAlert.classList.add("text-danger");
                isValid = false;
            } else {
                // Se la validazione è passata, nascondi l'alert
                locationAlert.classList.add("d-none");
                locationAlert.classList.remove("text-danger");
            }

            // Verifica se almeno una checkbox è stata selezionata
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

            if (skills.trim() === "") {
                skillsAlert.classList.remove("d-none", "text-muted");
                skillsAlert.classList.add("text-danger");
                isValid = false;
            } else {
                skillsAlert.classList.add("d-none");
                skillsAlert.classList.remove("text-danger");
            }

            return isValid;

        }

    });
</script>

<style>
    body {
        background-image: url(/cybersbg.jpg);
        background-size: auto;
        background-repeat: no-repeat;
        overflow-x: hidden;
    }

    .bg-form {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 40px;
        background-color: rgba(51, 51, 51, 0.6);
    }

    /* aggiunge un overlay trasparente all'immagine di sfondo */

    .my-bg {
        background-color: rgba(173, 171, 171, 0.3);
        width: 100%;
    }

    .title {
        font-size: 3rem;
        color: #27CDF2;

    }

    .info {
        font-size: 1rem;
        color: #27CDF2;
        font-weight: bold
    }

    .placeholder-font {
        color: #b0b1b2;
    }

    .username {
        font-size: 4rem;
        color: #27CDF2;

    }

    .description {
        color: #b0b1b2;
        padding: 2rem
    }

    .specialization-bg {
        background-color: rgba(51, 51, 51, 0.5);
        padding: 1rem;
        border-radius: 8px;
        color: #b0b1b2;

    }




    .categories-bg {
        margin-top: 15px
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