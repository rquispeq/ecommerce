<form action="{{ route('stripe.checkout') }}" method="post" id="payment-form">
    @csrf
    <div class="form-row">
        <div id="card-element" style="width:100%;" require>
        </div>


        <div id="card-errors"></div>
    </div>

    <div class="text-right">
        <button class="btn mt-2 btn-outline-primary">Submit Payment</button>
    </div>
</form>