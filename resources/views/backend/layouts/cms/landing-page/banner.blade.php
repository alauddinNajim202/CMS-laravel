@extends('backend.app')

@section('title', 'Banner')

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
                        <h4 class="card-title">Banner Section</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.landing-page.banner.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="1">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                            class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                            placeholder="Title" name="title" value="{{ $data[0]->title }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[0]->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Image:</label>
                                        <input class="form-control dropify @error('image_url') is-invalid @enderror"
                                            type="file" data-default-file="{{ $data[0]->image_url ? asset('/' . $data[0]->image_url) : asset('backend/img/placeholder/image_placeholder.png') }}"
                                            name="image_url">

                                        @error('image_url')
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
            .create(document.querySelector('#description1'), {
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