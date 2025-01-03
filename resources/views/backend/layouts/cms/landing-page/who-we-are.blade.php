@extends('backend.app')

@section('title', 'Who We Are')

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
                        <h4 class="card-title">Who We Are</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.landing-page.who-we-are.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="16">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[15]->title }}">
                                        @error('title')
                                          <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[15]->description }}</textarea>
                                        @error('description')
                                          <div style="color: red">{{$message}}</div>
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

@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
            font-size: 16px; /* Set the desired font size */
        }
    </style>
@endpush
@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'undo', 'redo', '|',
                    'fontSize' // Enable font size option in toolbar
                ],
                fontSize: {
                    options: [
                        10, 12, 14, 16, 18, 20, 24, 30, 36, 48
                    ]
                }
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



