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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a type="button" href="{{route('product.index')}}" class="btn" style="background-color: blue; color: white;
                            float:right;">Products</a>
                    <div class="container mt-4 overflow-auto">
                        <h2>Edit Product</h2>
                            <form class="my-3" action="{{route('product.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name*</label>
                                    <input type="text" class="form-control" id="name" name = "name"
                                    value="{{$data->name}}">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                </div>
                                    <div class=row>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Product Quantity*</label>
                                                <input type="number" class="form-control" id="quantity" name = "quantity"
                                                value="{{$data->quantity}}">
                                                @error('quantity')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price*</label>
                                                <input type="number" class="form-control" id="price" 
                                                value="{{$data->price}}" name="price">
                                                @error('price')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button class="btn" type="submit" style="background-color: green; 
                                            color: white;">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
