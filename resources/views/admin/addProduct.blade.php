@extends('layouts.starterTemplate')

@section('dashboard_title')
    {{Str::upper(request()->path())}}
@endsection

@section('main_section')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Product</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.storeProduct') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-2">
                                    <label for="">Name*</label>
                                    <input type="text" name="name" placeholder="Enter Cateory Name"
                                        value="{{ old('name') }}" class="form-control mb-2">
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Category*</label>
                                    <select name="category" id="" class="form-control mb-2 bg-dark">
                                        <option value=""></option>
                                        @foreach ($fetchCategory as $categoryData)

                                            <option value="{{ $categoryData->id }}" {{ old('category') == $categoryData->id ? 'selected' : '' }}>{{ $categoryData->category_name }}</option>

                                        @endforeach
                                    </select>

                                    @error('category')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Price*</label>
                                    <input type="text" name="price" placeholder="Enter Price" value="{{ old('price') }}"
                                        class="form-control mb-2">
                                    @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Regular Price</label>
                                    <input type="text" name="regular_price" placeholder="Enter Regular Price"
                                        value="{{ old('regular_price') }}" class="form-control mb-2">
                                    @error('regular_price')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Upload Photo*</label>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control mb-2">
                                    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Quantity</label>
                                    <input type="text" name="quantity" placeholder="Enter Quantity"
                                        value="{{ old('quantity') }}" class="form-control mb-2">
                                    @error('quantity')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>


                                <div class="col-md-12 mb-2">
                                    <label for="">Description*</label>
                                    <textarea name="description" rows="3" placeholder="Enter Description"
                                        value="{{ old('description') }}"
                                        class="form-control mb-2">{{ old('description') }}</textarea>
                                    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>


                                <div class="col-md-12">
                                    <button type="submit" name="add-category-btn"
                                        class="btn btn-primary w-100">Save</button>
                                </div>



                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

@endsection