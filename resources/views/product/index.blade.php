<x-app-layout>

    <div class=" py-4 bg-light">
        <div class="container">
            <div class="row">
                @foreach( $products as $product )
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">{{ $product->name }}</h3>
                                <p class="mt-3"> $ {{ $product->price }}</p>
                                <a href="{{ route('product.show',[ 'product' => $product->id]) }}" class="btn btn-primary mt-3">Rate</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>



