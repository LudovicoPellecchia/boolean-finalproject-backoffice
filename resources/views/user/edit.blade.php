@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h2 class="mb-4">Completa il tuo profilo!</h2>

        <form id="validationForm" action="{{ route('user.update', ['user' => $profile->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- Photo --}}
            <div class="form-group mb-4">

                <label for="photo" class="form-label">Photo<span class="text-danger">*</span>:</label>
                @if ($profile->photo)
                    <img src="{{ asset('/storage/' . $profile->photo) }}" alt=""
                        class="img-fluid border border-danger my-2 p-1" style="width: 100px">
                @endif
                <input type="file" accept="image/*" class="form-control @error('photo') is-invalid @enderror"
                    id="photo" name="photo">

                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="photoHelp" class="form-text text-muted">
                    Carica un'immagine per il tuo profilo in formato jpeg, png, jpg.
                </small>

            </div>

            {{-- Phone --}}
            <div class="form-group mb-4">
                <label for="phone" class="form-label">Phone<span class="text-danger">*</span>:</label>
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

                <small id="phoneHelp" class="form-text text-muted">
                    Inserisci il tuo numero di telefono.
                </small>

            </div>

            {{-- Location --}}
            <div class="form-group mb-4">

                <label for="location" class="form-label">Location<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                    placeholder="Inserisci la città in vui vivi attualmente" name="location"
                    value="{{ $profile->location }}">

                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
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

            {{-- Specializations --}}
            <div class="form-group mb-4">
                <label for="specializations">Specializations<span class="text-danger">*</span>:</label>

                @foreach ($specializations as $specialization)
                    <input class="form-check-input @error('description') is-invalid @enderror" type="checkbox"
                        name="specializations[]" id="{{ $specialization->id }}" value="{{ $specialization->id }}"
                        {{ $userSpecializations?->contains($specialization) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $specialization->id }}">{{ $specialization->name }}</label>
                @endforeach

                @error('specializations')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div>
                    <small id="specializationsAlert" class="form-text text-muted d-none">
                        Seleziona almeno una specializzazione.
                    </small>
                </div>

                <div>
                    <small id="locationHelp" class="form-text text-muted">
                        Inserisci almeno una specializzazione.
                    </small>
                </div>

            </div>

            {{-- Description --}}
            <div class="form-group mb-4">

                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    placeholder="Inserisci una tua breve descrizione" name="description">{{ $profile->description }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="descriptionHelp" class="form-text text-muted">
                    Raccontaci di te per raggiungere più utenti.La descrizione non deve superare i 500 caratteri (spazi
                    compresi).
                </small>

            </div>

            {{-- Skills  --}}
            <div class="form-group mb-4">

                <label for="skills" class="form-label">Skills<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control  @error('skills') is-invalid @enderror" id="skills"
                    placeholder="Inserisci le tue competenze" name="skills" value="{{ $profile->skills }}">

                @error('skills')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div>
                    <small id="skillsAlert" class="form-text text-muted d-none">
                        Il campo skills è obbligatorio
                    </small>
                </div>

                <small id="skillsHelp" class="form-text text-muted">
                    Descrivi brevemente quali sono le tue competenze.
                </small>

            </div>

            {{-- Curriculum  --}}
            <div class="form-group mb-4">

                <label for="curriculum" class="form-label">Curriculum<span></span>:</label>
                <input type="file" class="form-control @error('curriculum') is-invalid @enderror" name="curriculum">

                @error('curriculum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="curriculumHelp" class="form-text text-muted">
                    Carica il tuo curriculum vitae in formato pdf.
                </small>

            </div>

            {{-- Visible --}}
            <div class="form-group mb-4">

                <label for="visible" class="form-label">Visible<span></span>:</label>
                <select type="select" class="form-select @error('visible') is-invalid @enderror" id="visible"
                    name="visible" value="{{ $profile->visible }}">
                    <option value="1" {{ $profile->visible == 1 ? 'selected' : '' }}>Si</option>
                    <option value="0" {{ $profile->visible == 0 ? 'selected' : '' }}>No</option>
                </select>

            </div>

            {{-- Button  --}}
            <div class="pt-3 pb-5 text-end">
                <button type="submit" class="btn btn-primary btn-lg">CONFERMA</button>
            </div>

        </form>

        {{-- Il codice js deve essere posizionato dopo l'HTML del form per accedere agli elementi del form.  --}}



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
