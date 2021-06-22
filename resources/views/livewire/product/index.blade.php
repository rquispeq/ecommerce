<div class="container">
    <div class="row">
    @foreach($products as $product)
        <div class="col-sm-4 mb-2">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="card image cap" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">${{ $product->price }} <sup>00</sup></h5>
                    <p><span>12x$10.75 sin interés</span></p>
                    <div class="d-flex-justify-content-end">
                        <button class="btn btn-outline-primary">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
