@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div>
                        <a href="{{ route('user.index') }}" class="btn btn-primary">Il mio profilo</a>
                        <a href="{{ route('token') }}" class="btn btn-primary">Pagamento</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
