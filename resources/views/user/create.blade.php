@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h2 class="mb-4">Crea il tuo profilo!</h2>

        <form id="validationForm" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Photo --}}
            <div class="form-group mb-4">

                <label for="photo" class="form-label">Photo<span></span>:</label>
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
                    placeholder="es. 1234567891" name="phone" value="{{ old('phone') }}"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="phoneHelp" class="form-text text-muted">
                    Inserisci il tuo numero di telefono.
                </small>

            </div>

            {{-- Location --}}
            <div class="form-group mb-4">
                <label for="location" class="form-label">Location<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                    placeholder="Inserisci la città in cui vivi attualmente" name="location" value="{{ old('location') }}">

                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="locationHelp" class="form-text text-muted">
                    Inserisci la città in cui risiedi.
                </small>
            </div>


            {{-- Specializations --}}
            <div class="form-group mb-4">
                <label for="specializations">Specializations<span class="text-danger">*</span>:</label>

                @foreach ($specializations as $specialization)
                    <input class="form-check-input @error('specializations') is-invalid @enderror" id="specializations" type="checkbox"
                        name="specializations[]">
                    <label class="form-check-label" for="{{ $specialization->id }}">{{ $specialization->name }}</label>
                @endforeach

                @error('specializations')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

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
                    placeholder="Inserisci una tua breve descrizione" name="description">{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="descriptionHelp" class="form-text text-muted">
                    Raccontaci di te per raggiungere più utenti.La descrizione non deve superare i 500 caratteri (spazi compresi).
                </small>

            </div>

            {{-- Skills  --}}
            <div class="form-group mb-4">

                <label for="skills" class="form-label">Skills<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control @error('skills') is-invalid @enderror" id="skills"
                    placeholder="Inserisci le tue competenze" name="skills" value="{{ old('skills') }}">

                @error('skills')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="skillsHelp" class="form-text text-muted">
                    Descrivi brevemente quali sono le tue competenze.
                </small>

            </div>

            {{-- Curriculum --}}
            <div class="form-group mb-4">

                <label for="curriculum" class="form-label">Curriculum<span class="text-danger">*</span>:</label>
                <input type="file" class="form-control  @error('curriculum') is-invalid @enderror" name="curriculum">

                @error('curriculum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="curriculumHelp" class="form-text text-muted">
                    Carica il tuo curriculum vitae in formato pdf.
                </small>

            </div>

            {{-- Visible --}}
            <div class="form-group mb-4">

                <label for="visible" class="form-label">Visible<span class="text-danger">*</span>:</label>
                <select type="select" class="form-select @error('visible') is-invalid @enderror" id="visible"
                    name="visible" value="{{ old('visible') }}">
                    <option hidden>Seleziona la tipologia</option>
                    <option value="1" {{ old('visible') == '1' ? 'selected' : '' }}>Si</option>
                    <option value="0" {{ old('visible') == '0' ? 'selected' : '' }}>No</option>
                </select>

                @error('visible')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Button  --}}
            <div class="pt-3 pb-5 text-end">
                <button id="createBtn" type="submit" class="btn btn-lg btn-primary">CREA</button>
            </div>

        </form>

    </div>

@endsection

{{-- Il codice js deve essere posizionato dopo l'HTML del form per accedere agli elementi del form.  --}}

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
            let isValid = true;


            // Se la validazione non ha avuto successo, non refreshare la pagina
            if (phone.trim() === "") {
                alert("Il campo phone è obbligatorio");
                isValid = false;
            }

            if (location.trim() === "") {
                alert("Il campo location è obbligatorio");
                isValid = false;
            }

            if (skills.trim() === "") {
                alert("Il campo skills è obbligatorio");
                isValid = false;
            }

            return isValid;

        }

    });

</script>
