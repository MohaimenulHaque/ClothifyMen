@extends('layouts.starterTemplate')

@section('dashboard_title')
    {{Str::upper(request()->path())}}
@endsection

@section('main_section')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('admin.storeWesSettins') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-2">
                                    <label for="">Website Name</label>
                                    <input type="text" name="name" placeholder="Enter Website Name"
                                        value="{{ old('name', $fetchSettingsData?->website_name) }}"
                                        class="form-control mb-2">
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Email</label>
                                    <input type="text" name="email" placeholder="example@gmail.com"
                                        value="{{ old('email', $fetchSettingsData?->email) }}" class="form-control mb-2">
                                    @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact" placeholder="017XXXXXXXX"
                                        value="{{ old('contact', $fetchSettingsData?->contact) }}"
                                        class="form-control mb-2">
                                    @error('contact')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>


                                <div class="col-md-12 mt-4 mb-1">
                                    <h2 class="heading">Logos</h2>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Upload Logo</label>
                                    <input type="file" name="logo" class="form-control mb-2">
                                    @error('logo')<div class="text-danger">{{ $message }}</div>@enderror

                                    <img src="{{ asset('upload/web_img/' . ($fetchSettingsData?->logo ?? 'default_img.png')) }}" id="showImage"
                                        style="width: 100px; " alt="Logo">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Favicon</label>
                                    <input type="file" name="favicon" class="form-control mb-2">
                                    @error('favicon')<div class="text-danger">{{ $message }}</div>@enderror

                                    <img src="{{ asset('upload/web_img/' . ($fetchSettingsData->favicon ?? 'default_img.png')) }}" id="showImage"
                                        style="width: 100px; height: 100px;" alt="Favicon">
                                </div>

                                <div class="col-md-12 mt-4 mb-1">
                                    <h2 class="heading">Social Media Links</h2>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Facebook Link</label>
                                    <input type="text" name="facebook" placeholder="https://www.facebook.com/"
                                        value="{{ old('facebook', $fetchSettingsData?->facebook_link) }}" class="form-control mb-2">
                                    @error('facebook')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Instagram Link</label>
                                    <input type="text" name="instagram" placeholder="https://www.instagram.com/"
                                        value="{{ old('instagram', $fetchSettingsData?->instagram_link) }}" class="form-control mb-2">
                                    @error('instagram')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Linkedin Link</label>
                                    <input type="text" name="linkedin" placeholder="https://www.linkedin.com/feed/"
                                        value="{{ old('linkedin', $fetchSettingsData?->linkedin_link) }}" class="form-control mb-2">
                                    @error('linkedin')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>



                                <div class="col-md-12">
                                    <button type="submit" name="save-btn" class="btn btn-primary w-100">Save</button>
                                </div>



                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection