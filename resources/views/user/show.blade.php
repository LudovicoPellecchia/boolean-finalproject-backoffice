@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <h2>Profile Details</h2>
    <div>
        <strong>Photo:</strong> {{ $profile->photo }}
    </div>
    <div>
        <strong>Phone:</strong> {{ $profile->phone }}
    </div>
    <div>
        <strong>Location:</strong> {{ $profile->location }}
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

    <div class="mb-3 mt-3">
        <a href="{{ route('user.edit', $profile->id) }}" class="btn btn-warning">Modifica</a>
    </div>
    
    <form action="{{ route('user.destroy', $profile->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo utente?')">Cancella</button>
    </form>

</div>
@endsection
