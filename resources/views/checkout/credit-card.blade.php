@extends('layouts.app')

@section('content')
<body>
    @php
        $stripe_key = 'pk_test_aXD4fXMdRP4NYHzMuWwLfcei00dhHQeEqH';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                <button onclick="window.location.href='/home'" type="button" class="btn btn-primary">Retourne a l'accueil</button>
                    <p>1. Card number "numéro de carte" se trouvont a l'avant de votre carte bancaire particulierement long.</p>
                    <p>2. MM/YY "Mois/Annee" a l'avant de votre carte bancaire Ex: 11/23.</p>
                    <p>3. CVC numéro se trouvont a l'arriere de votre carte bancaire, composé de 3 chiffre.</p>
                    <p> L'operation vous coutera $10 apres avoir appuyé "Payé".</p>
                </div>
                <div class="card">

                    <form action="{{route('checkout.credit-card')}}"  method="post" id="payment-form">
                        @csrf                    
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Entree les information de votre carte bancaire
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        > Payé </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
    </script>
</body>

@endsection