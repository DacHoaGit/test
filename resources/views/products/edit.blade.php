@extends('master')

@section('content')
    <div style="height: 80vh;" class="d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="bg-light p-4 p-md-5 border border-info rounded border-1">
                <h3 class="text-center mb-4">Update Product</h3>
                @isset($product)
                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $product->name }}" type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name" required>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input value="{{ $product->price }}" type="number" name="price"
                                class="form-control @error('name') is-invalid @enderror" id="name" required>
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                id="description" required>{{ $product->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>


                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" name="image" type="file" id="selectImage" accept="image/*"
                                id="image">
                        </div>

                        <div class="mb-3">
                            <img id="preview" width="100px" src="{{ asset('images/' . $product->image) }}" alt="Ảnh sản phẩm"
                                alt="...">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endisset
            </div>
        </div>
    </div>
    @push('script')
        <script>
            selectImage.onchange = evt => {
                preview = document.getElementById('preview');
                preview.style.display = 'block';
                const [file] = selectImage.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endpush
@endsection
