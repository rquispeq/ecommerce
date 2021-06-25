<div>
    <h2 class="text-center">Produtos del carrito</h2>
    <div class="card">
        @if(session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif
        <div class="card-body">
            <table class="table text-center table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><button class="btn btn-danger" wire:click="deleteProduct({{ $product->pivot->id }})"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    @endforeach
                        <tr>
                            <td></td>
                            <td class="font-weight-bold">Total</td>
                            <td class="font-weight-bold">{{ $products->sum('price') }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ $stripeKey }}");
    </script>
@endpush