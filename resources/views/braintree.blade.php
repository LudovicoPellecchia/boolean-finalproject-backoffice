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

    <div class="py-12">
        <div id="dropin-container" style="display: flex; justify-content: center; align-items: center;"></div>
        <div style="display: flex; justify-content: center; align-items: center; color: white">
            @if(session('message'))
                <div class="alert {{ session('message') === 'Pagamento avvenuto con successo!' ? 'alert-success' : 'alert-danger' }}" role="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

    <input type="hidden" name="payment-method-nonce" id="payment-nonce">
    <button type="submit" class="btn btn-sm btn-success" id="submit-button">Submit payment</button>
</form>

<script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
<script>
    var button = document.querySelector('#submit-button');
    var form = document.querySelector('#payment-form');

    braintree.dropin.create({
        authorization: '{{$token}}',
        container: '#dropin-container'
    }, function (createErr, instance) {
        button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
                // Submit payload.nonce to your server
                document.getElementById('payment-nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
</script>

@endsection
