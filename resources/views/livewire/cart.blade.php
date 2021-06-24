<div class="d-flex align-items-center">
    <span class="badge badge-primary">{{ $cart->amount() }}</span>
    <a href="{{ route('checkout') }}" class="nav-link">
        <i class="fa fa-shopping-cart" style="font-size: 25px;" aria-hidden="true"></i>
    </a>
</div>
