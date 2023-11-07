@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h2 class="mb-4">Crea il tuo profilo!</h2>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone"
                placeholder="es. 1234567891" name="phone" value="{{ old('phone') }}"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required autocomplete="phone" autofocus>
                

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
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="phone"
                    placeholder="Inserisci la città in vui vivi attualmente" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus>

                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="locationHelp" class="form-text text-muted">
                    Inserisci la città in cui risiedi.
                </small>

            </div>

            {{-- Specializations --}}
            <div class="form-group">
                <label for="specializations">Specializations<span class="text-danger">*</span>:</label>

                @foreach ($specializations as $specialization)
                    <input class="form-check-input @error('specializations') is-invalid @enderror" type="checkbox" name="specializations[]">
                    <label class="form-check-label" for="{{ $specialization->id }}">{{ $specialization->name }}</label>
                @endforeach

                @error('specializations')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group mb-4">

                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    placeholder="Inserisci una tua breve descrizione" name="description" value="{{ old('description') }}"></textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="descriptionHelp" class="form-text text-muted">
                    Raccontaci di te per raggiungere più utenti.
                </small>

            </div>

            {{-- Skills  --}}
            <div class="form-group mb-4">

                <label for="skills" class="form-label">Skills<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control @error('skills') is-invalid @enderror" id="skills"
                    placeholder="Inserisci le tue competenze" name="skills" value="{{ old('skills') }}" required autocomplete="skills" autofocus>

                @error('skills')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small id="skillsHelp" class="form-text text-muted">
                    Inserisci le tue abilità.
                </small>

            </div>

            {{-- Curriculum --}}
            <div class="form-group mb-4">

                <label for="curriculum" class="form-label">Curriculum<span class="text-danger">*</span>:</label>
                <input type="file" class="form-control  @error('curriculum') is-invalid @enderror" name="curriculum" required autocomplete="curriculum" autofocus>

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
                <button type="submit" class="btn btn-lg btn-primary">CREA</button>
            </div>

        </form>

    </div>
@endsection
