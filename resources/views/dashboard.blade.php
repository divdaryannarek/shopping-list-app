<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="jumbotron">
                        <h1 class="display-4">Hi, there!</h1>
                        <p class="lead">With this simple application, you can rate products all over the world.</p>
                        <hr class="my-4">
                        <a class="btn btn-primary btn-lg" href="{{ route('product.index') }}" role="button">Rate the Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
