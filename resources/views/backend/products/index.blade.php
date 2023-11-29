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
                                                <a href = "{{route('product.edit', $product -> id)}}" type="button" class="btn btn-primary" style="background-color: black">Edit</a>
                                                <button type="button" class="btn"
                                                data-bs-toggle="modal" data-bs-target="#showModal" 
                                                style="background-color: red; color:white;" onclick="fetchAndPopulateData({{$product->id}})">Show</button>
                                                    <form action="{{route('product.delete', $product->id)}}" method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                                            class="btn" style="background-color: green; color: white;">Delete</button>
                                                    </form>
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
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBodyContent">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: black; color:white;">Close</button>
            </div>
            </div>
        </div>
        </div>

        <script>
    function fetchAndPopulateData(productId) {
        
        fetch(`/products/${productId}`) 
            .then(response => response.json())
            .then(data => {
                
                populateModal(data);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function populateModal(data) {
        document.getElementById('showModalLabel').textContent = data.product.name; 
        document.getElementById('modalBodyContent').innerHTML = formatDataForModal(data);

    }

    function formatDataForModal(data) {
        return `
            <p>Name: ${data.product.name}</p>
            <p>Price: ${data.product.price}</p>
            <p>Quantity: ${data.product.quantity}</p>
           
        `;
    }
</script>
</x-app-layout>
