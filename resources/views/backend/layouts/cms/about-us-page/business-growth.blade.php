@extends('backend.app')

@section('title', 'Legal Area')

@push('styles')
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
                        <h4 class="card-title">Legal Area Section</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.about-us.business-growth.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="10">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[9]->title }}">
                                        @error('title')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title Description</label>
                                        <textarea class="form-control @error('title_description') is-invalid @enderror" name="title_description" id="title_description">{{ $data[9]->title_description }}</textarea>
                                        @error('title_description')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Point One</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('sub_title') is-invalid @enderror"
                                               placeholder="Sub Title" name="sub_title" value="{{ $data[9]->sub_title }}">
                                        @error('sub_title')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[9]->description }}</textarea>
                                        @error('description')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Point Two</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('button_text') is-invalid @enderror"
                                                name="button_text" value="{{ $data[9]->button_text }}">
                                        @error('button_text')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Description</label>
                                        <textarea class="form-control @error('sub_description') is-invalid @enderror" name="sub_description" id="sub_description">{{ $data[9]->sub_description }}</textarea>
                                        @error('sub_description')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">First Image:</label>
                                        <input class="form-control dropify @error('image_url') is-invalid @enderror"
                                            type="file" data-default-file="{{ $data[9]->image_url ? asset('/' . $data[9]->image_url) : asset('backend/img/placeholder/image_placeholder.png') }}"
                                            name="image_url">

                                        @error('image_url')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Second Image:</label>
                                        <input class="form-control dropify @error('second_image_url') is-invalid @enderror"
                                            type="file" data-default-file="{{ $data[9]->second_image_url ? asset('/' . $data[9]->second_image_url) : asset('backend/img/placeholder/image_placeholder.png') }}"
                                            name="second_image_url">

                                        @error('second_image_url')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Third Image:</label>
                                        <input class="form-control dropify @error('third_image_url') is-invalid @enderror"
                                            type="file" data-default-file="{{ $data[9]->third_image_url ? asset('/' . $data[9]->third_image_url) : asset('backend/img/placeholder/image_placeholder.png') }}"
                                            name="third_image_url">

                                        @error('third_image_url')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#title_description'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#sub_description'), {
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



