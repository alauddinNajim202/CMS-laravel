@extends('backend.app')

@section('title', 'Edit Articoli')

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Articoli</h4>
                        <div class="mt-4">
                            <form class="forms-sample" action="{{ route('blogs.update', ['id' => $data->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <div class="col">
                                                <label class="form-lable required">Articoli details Image:</label>
                                                <input
                                                    class="form-control dropify @error('detail_image_url') is-invalid @enderror"
                                                    type="file" data-default-file="{{ $data->detail_image_url ? asset('/' . $data->detail_image_url) : asset('backend/img/placeholder/image_placeholder.png') }}" name="detail_image_url">

                                                @error('detail_image_url')
                                                    <div style="color: red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label class="form-lable required">Name:</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ $data->title }}">
                                            @error('title')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <div class="col">
                                                <label class="form-lable required">Articoli  Image:</label>
                                                <input
                                                    class="form-control dropify @error('blog_image') is-invalid @enderror"
                                                    type="file" data-default-file="{{ $data->blog_image ? asset('/' . $data->blog_image) : asset('backend/img/placeholder/image_placeholder.png') }}" name="blog_image">

                                                @error('blog_image')
                                                    <div style="color: red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <div class="col">
                                                    <label class="form-lable required">Introduction:</label>
                                                    <textarea class="form-control @error('introduction') is-invalid @enderror" name="introduction" id="introduction">{{ $data->introduction }}</textarea>
                                                    @error('introduction')
                                                        <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <div class="col">
                                                    <label class="form-lable required">About It:</label>
                                                    <textarea class="form-control @error('about_it') is-invalid @enderror" name="about_it" id="about_it">{{ $data->about_it }}</textarea>
                                                    @error('about_it')
                                                        <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <div class="col">
                                                    <label class="form-lable required">Why Consultancy:</label>
                                                    <textarea class="form-control @error('why') is-invalid @enderror" name="why" id="why">
                                                        {{ $data->why }}</textarea>
                                                    @error('why')
                                                        <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <div class="col">
                                                    <label class="form-lable required"> Consultancy Image:</label>
                                                    <input
                                                        class="form-control dropify @error('image_url') is-invalid @enderror"
                                                        type="file" data-default-file="{{ $data->image_url ? asset('/' . $data->image_url) : asset('backend/img/placeholder/image_placeholder.png') }}" name="image_url">

                                                    @error('image_url')
                                                        <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <div class="col">
                                                    <label class="form-lable required">End:</label>
                                                    <textarea class="form-control @error('end') is-invalid @enderror" name="end" id="end">
                                                        {{ $data->end }}</textarea>
                                                    @error('end')
                                                        <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <a href="{{ route('blogs.index') }}" class="btn btn-danger ">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#introduction'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#about_it'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#why'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#end'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });


        $('.dropify').dropify();



        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
