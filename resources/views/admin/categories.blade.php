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
        <a class=" bg-primary p-2 text-white text-decoration-none rounded float-right" href="{{ route('addCategory') }}">+ Add Category</a>

        <div class="table-responsive">
            
            <table class="table table-dark table-striped table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
    
                    @foreach ($getCategory as $Category)
                    
                        <tr>
                            {{-- <th scope="row">{{ $Category->id }}</th> --}}
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $Category->category_name }}</td>
                            <td>
                                <img src="upload/categories/{{  $Category->img }}" style="width:100px;" alt="">
                            </td>
                            <td>
                                <a href="{{ route('editCategory', Crypt::encrypt($Category->id) ) }}" class="bg-success px-2 py-1 rounded text-white text-decoration-none">Edit</a>
                                <a href="{{ route('deleteCategory', Crypt::encrypt($Category->id) ) }}" class="bg-danger px-2 py-1 rounded text-white text-decoration-none">Delete</a>
                            </td>
                        </tr>
    
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection