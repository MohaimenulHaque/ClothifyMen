@extends('layouts.starterTemplate')

@section('main_section')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Category</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.updateProduct', $getEditProduct->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-2">
                                    <label for="">Name*</label>
                                    <input type="text" name="name" placeholder="Enter Cateory Name"
                                        value="{{ $getEditProduct->product_name }}" class="form-control mb-2">
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Category*</label>
                                    <select name="category" id="" class="form-control mb-2 bg-dark">
                                        <option value=""></option>
                                        @foreach ($categories as $categoryData)
                                            <option value="{{ $categoryData->id }}" {{ $categoryData->id ? 'selected' : '' }}>{{ $categoryData->category_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Upload Photo*</label>
                                    <input type="file" name="image" value="{{ $getEditProduct->img }}"
                                        class="form-control mb-2">
                                    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                    <img src="{{ asset('upload/products/' . $getEditProduct->img) }}" id="showImage"
                                        style="width: 100px; height: 100px;" alt="">
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="">Description*</label>
                                    <textarea name="description" rows="3"
                                        class="form-control mb-2"> {{ $getEditProduct->description }} </textarea>
                                    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="">Active</label>
                                    <input type="checkbox" name="active" {{ $getEditProduct->is_active ? 'checked' : '' }}>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="add-category-btn" class="btn btn-primary w-100">Save
                                        Change</button>
                                </div>



                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection