@extends('layouts.app')

@section('content')

<form action="{{ route('form.submit') }}" method="post" id="payment-form">
    @csrf

    <label for="sponsor">Sponsor:</label>
    <select name="sponsor" id="sponsor">
        <option value="2.99">2.99$ per 24 ore</option>
        <option value="5.99">5.99$ per 72 ore</option>
        <option value="9.99">9.99$ per 144 ore</option>
    </select>


    <button type="submit">Invia</button>
</form>



@endsection