@extends('layouts.app')
@section('content')
@foreach($user as $user )
    <div>
        <strong>Name:</strong> {{ $user->name }}
    </div>
    <div>
        <strong>Surname:</strong> {{ $user->surname }}
    </div>
    <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">Il mio profilo</a>
@endforeach
<div class="container pt-5 text-center">
    <a href="{{ route('user.create') }}" class="btn btn-primary">Crea un profilo</a>
</div>
@endsection