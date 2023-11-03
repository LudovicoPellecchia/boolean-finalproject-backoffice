@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <h2 class="mb-4">Create Profile</h2>

        <form method="post" action="{{ route('user.store') }}">
            @csrf

            {{-- Photo --}}
            <div class="form-group mb-4">

                <label for="photo" class="form-label">Photo:</label>
                <input type="text" class="form-control @error('photo') is-invalid @enderror" id="photo"
                    placeholder="Inserisci la tua immagine del profilo" name="photo" value="{{ old('photo') }}">

                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Phone --}}
            <div class="form-group mb-4">

                <label for="phone" class="form-label">Phone:</label>
                <input type="number" class="form-control  @error('phone') is-invalid @enderror" id="phone"
                    placeholder="Inserisci il tuo numero di telefono" name="phone" value="{{ old('phone') }}">

                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Location --}}
            <div class="form-group mb-4">

                <label for="location" class="form-label">Location:</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="phone"
                    placeholder="Inserisci la città in vui vivi attualmente" name="location" value="{{ old('location') }}">

                @error('location')
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

            </div>

            {{-- Skills  --}}
            <div class="form-group mb-4">

                <label for="skills" class="form-label">Skills:</label>
                <input type="text" class="form-control @error('skills') is-invalid @enderror" id="skills"
                    placeholder="Inserisci le tue competenze" name="skills" value="{{ old('skills') }}">

                @error('skills')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Curriculum --}}
            <div class="form-group mb-4">
                <label for="curriculum">Curriculum:</label>
                <input type="text" class="form-control" name="curriculum">
            </div>

            {{-- Visible --}}
            <div class="form-group mb-4">
                
                <label for="visible" class="form-label">Visible:</label>
                <select type="select" class="form-select @error('visible') is-invalid @enderror" id="visible" name="visible" value="{{ old('visible') }}">
                    <option hidden>Seleziona la tipologia</option>
                    <option value="1" {{ old("visible") == '1' ? 'selected' : ''}}>Si</option>
                    <option value="0" {{ old("visible") == '0' ? 'selected' : ''}}>No</option>
                </select>

                @error('visible')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- Button  --}}
            <div class="pt-5 text-center">
                <button type="submit" class="btn btn-lg btn-primary">CREATE</button>
            </div>

        </form>

    </div>

@endsection
