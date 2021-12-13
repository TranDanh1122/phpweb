@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Payment Form')

@section('content')
<?php
$public_key="pk_test_51Jqy4oHk0oUxzgajR6D6JxQGuoprtD91cE22jYUdb1JDXWr4w4DMX9fNe5Pf28moeJnWFaSO4vUTvBh1w5zNDe0L00pzr0xouC";
$secret_key="sk_test_51Jqy4oHk0oUxzgajE6K2RswXd23Ct9j0w2gv09mUVVd8yYzuoN4Xr4L5kP03oPZ1I5vmM4tHZW6ReONkJSFyZi3m00mXeubWuQ";
?>
    <section>
        <form method="post" id="form-payment" action="{{url('/payment-reponse')}}">
            @csrf
            <label for="name">name</label>
        <input type="text" name="name" id="name">
        <div id="card-result"></div>
        <div id="card-ele"></div>
        <input type="hidden" id="token" name="token">
        <button type="button" name="submit" value="submit" id="submit">Submit</button>
        <button type="submit" id="sub"></button>
    </form>
    </section>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51Jqy4oHk0oUxzgajR6D6JxQGuoprtD91cE22jYUdb1JDXWr4w4DMX9fNe5Pf28moeJnWFaSO4vUTvBh1w5zNDe0L00pzr0xouC');

        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-ele');

        var cardholderName = document.getElementById('name');
        var token = document.getElementById('token');
var cardButton = document.getElementById('submit');
var resultContainer = document.getElementById('card-result');

cardButton.addEventListener('click', function(ev) {

  stripe.createPaymentMethod({
      type: 'card',
      card: cardElement,
      billing_details: {
        name: cardholderName.value,
      },
    }
  ).then(function(result) {
    if (result.error) {
      // Display error.message in your UI
      resultContainer.textContent = result.error.message;
    } else {
      // You have successfully created a new PaymentMethod
      token.value=result.paymentMethod.id;
      resultContainer.textContent = "Created payment method: " + result.paymentMethod.id;
      $("#sub").click();
    }
  });
});
</script>
@endsection