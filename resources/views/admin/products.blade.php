@extends('layouts.starterTemplate')

@section('dashboard_title')
    {{Str::upper(request()->path())}}
@endsection

@section('main_section')

    @if (session('success'))

        <div class="alert alert-success" id="alert">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                document.getElementById('alert').style.display = 'none';
            }, 3000);
        </script>
    @endif

    <div class="m-4">
        <a class=" bg-primary p-2 text-white text-decoration-none rounded float-right" href="{{ route('admin.addProduct') }}">+
            Add Product</a>

        <div class="table-responsive">

            <table class="table table-dark table-striped table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Products</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($fatchProduct as $products)

                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $products->product_name }}</td>
                            <td>
                                <img src="{{ asset('upload/products/'. $products->img) }}" style="width:100px;" alt="">
                            </td>
                            <td>
                                <a href="{{ route('admin.editProduct', Crypt::encrypt($products->id)) }}"
                                    class="bg-success px-2 py-1 rounded text-white text-decoration-none">Edit</a>
                                <a href="{{ route('admin.deleteProduct', Crypt::encrypt($products->id)) }}"
                                    class="bg-danger px-2 py-1 rounded text-white text-decoration-none">Delete</a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>

    </div>

@endsection