@extends('layouts.app')

@section('content')
<div class="py-12">
    
    <form action="{{ route('token') }}" method="post">
        @csrf

        <input type="hidden" name="nonce" id="payment-nonce">
        
        <label for="sponsor_plan">Seleziona il piano di sponsorizzazione:</label>
        <select name="sponsor_plan" id="sponsor_plan" required>
            <option value="24">24 ore - €2.99</option>
            <option value="72">72 ore - €5.99</option>
            <option value="144">144 ore - €9.99</option>
        </select>

        <label for="sponsor_name">Nome dello sponsor:</label>
        <input type="text" name="sponsor_name" id="sponsor_name" required>

        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
        <div style="display: flex;justify-content: center;align-items: center; color: white">
            <button id="submit-button"  type="submit" class="btn btn-sm btn-success">Submit payment</button>
        </div>
    </form>


    <script>
        var button = document.querySelector('#submit-button');
        var form = document.querySelector('form');
        var nonceField = document.querySelector('#payment-nonce');

        braintree.dropin.create({
            authorization: '{{$token}}',
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    // Aggiungi il nonce al campo nascosto nel form
                    nonceField.value = payload.nonce;
                    // Invia il form
                    form.submit();
                });
            });
        });
    </script>
</div>

@endsection
