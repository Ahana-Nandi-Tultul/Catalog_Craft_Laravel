<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <a href="{{url('/dashboard')}}" class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </a>
            <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{route('product.index')}}">
                {{ __('Products') }}
            </a>
        </div>
     </x-slot>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div class="container mt-4 overflow-auto">
                            <h2>Products</h2>
                            <a type="button" href="{{route('product.create')}}" class="btn" style="background-color: blue; color: white;
                            float:right;">Add A Product</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="productsTableBody">
                                    @php $ind = 1; @endphp
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$ind++}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary" style="background-color: black">Edit</button>
                                                <button type="button" class="btn btn-primary" style="background-color: red">Show</button>
                                                <button type="button" class="btn btn-primary" style="background-color: green">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/api/products')
                .then(response => response.json())
                .then(data => {
                    const productsTableBody = document.getElementById('productsTableBody');
                    data.products.forEach(product => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${product.id}</td>
                            <td>${product.name}</td>
                            <td>${product.price}</td>
                        `;
                        productsTableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching products:', error));
        });
    </script> -->
</x-app-layout>
