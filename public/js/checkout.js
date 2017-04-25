//setting my publishable stripe key to identify myself
Stripe.setPublishableKey('pk_test_8GhREXi5fFnwjjulOI9hT8A5');

//form
var $form = $('#checkout-form');

//on form submission
$form.submit(function(event){

    //hiding previous error
    $('#charge-error').addClass('hidden');

    //disabling form button
    $form.find('button').prop('disabled',true);

    //collecting card information from form
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#name').val(),
        address_line1: $('#address').val()
    }, stripeResponseHandler);
    //returning false because of stripeResponse handler
    return false;
});

//stripeResponseHandler
function stripeResponseHandler(status, response){
    if(response.error){ //if there is any error
        $('#charge-error').removeClass('hidden'); //removing hidden class
        $('#charge-error').text(response.error.message); //displaying an error
        $form.find('button').prop('disabled',false); //enabling form button
    }else{
        //receiving stripe token
        var token = response.id;

        //adding token to the form
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));

        //submitting form
        $form.get(0).submit();
    }
}