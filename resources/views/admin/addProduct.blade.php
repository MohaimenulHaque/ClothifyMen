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
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.storeProduct') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-2">
                                <label for="">Name*</label>
                                <input type="text" name="name" placeholder="Enter Cateory Name" value="{{ old('name') }}" class="form-control mb-2">
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

                            <div class="col-md-12 mb-2">
                                <label for="">Upload Photo*</label>
                                <input type="file" name="image" value="{{ old('image') }}" class="form-control mb-2">
                                @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                {{-- <img src="{{ asset('frontend/img/Favicon.png') }}" id="showImage" style="width: 100px; height: 100px;" alt=""> --}}
                            </div>
                                
                            <div class="col-md-12 mb-2">
                                <label for="">Description*</label>
                                <textarea name="description" rows="3" placeholder="Enter Description" value="{{ old('description') }}" class="form-control mb-2"></textarea>
                                @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            {{-- <div class="col-md-3">
                                <label for="">Active</label>
                                <input type="checkbox" name="active" >
                            </div> --}}

                            <div class="col-md-12">
                                <button type="submit" name="add-category-btn" class="btn btn-primary w-100">Save</button>
                            </div>

                            

                        </div>

                    </form>

                </div> 
            </div>
        </div>
    </div>
</div>

@endsection