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
        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
        <div style="display: flex;justify-content: center;align-items: center; color: white">
    </div>

    <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>

</form>

<script>
    var button = document.querySelector('#submit-button');
    braintree.dropin.create({
        authorization: '{{$token}}',
        container: '#dropin-container'
    }, function (createErr, instance) {
        button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
                // Submit payload.nonce to your server
                document.getElementById('payment-nonce').value = payload.nonce;
                document.getElementById('payment-form').submit();
            });
        });
    });
</script>


@endsection