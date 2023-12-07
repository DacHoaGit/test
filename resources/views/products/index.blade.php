@extends('master')

@section('content')
    <div class="container mt-3">

        <div class="input-group  mb-3 mt-3 w-50">
            <a href="{{ route('products.create') }}" class="btn btn-info btn-search" type="button" id="button-addon2">Create</a>
        </div>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col">Price</th>
                    <th class="text-center" scope="col">Description</th>
                    <th class="text-center" scope="col">Created at</th>
                    <th class="text-center" scope="col">Updated at</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td class="text-center">
                                <img width="64px" src="{{asset('images/' . $product->image)}}" alt="">
                                
                            </td>
                            <td class="text-center">{{ $product->price }}</td>
                            <td class="w-25">{{ $product->description }}</td>
                            <td class="text-center">{{ $product->created_at }}</td>
                            <td class="text-center">{{ $product->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="{{route('products.update', ['product' => $product->id])}}"
                                            class="btn btn-info btn-sm btn-update">Update</a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <form action="{{ route('products.destroy',['product' => $product->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="submit btn btn-danger btn-sm btn-delete">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
