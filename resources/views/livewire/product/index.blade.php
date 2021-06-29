<div class="container">
@if(session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
    <div class="row">
    @foreach($products as $product)
        <div class="col-sm-4 mb-2">
            <div class="card" style="width: 18rem;">
                <a href="{{ route('products.show',['product' => $product->slug]) }}">
                    <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="card image cap" class="card-img-top">
                </a>
                <div class="card-body">
                    <h5>{{ $product->name }}</h5>
                    <h5 class="card-title font-weight-bold">${{ $product->price }} <sup>00</sup></h5>
                    <p><span>12x$10.75 sin interés</span></p>
                    <div class="d-flex-justify-content-end">
                        <button class="btn btn-outline-primary" wire:click="addToCart('{{ $product->slug }}')">Add to cart</button>
                    </div>
                    @if(!is_null(auth()->user()) and auth()->user()->isAdmin())
                        <div class="d-flex-justify-content-end">
                            <a href="{{ route('products.edit',$product->slug) }}" class="btn btn-outline-primary" >Edit</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
