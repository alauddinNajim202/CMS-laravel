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
                            <form action="{{ route('cms.landing-page.expert-preceptor.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="3">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[2]->title }}">
                                        @error('title')
                                           <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Sub Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('sub_title') is-invalid @enderror"
                                               placeholder="Sub Title" name="sub_title" value="{{ $data[2]->sub_title }}">
                                        @error('sub_title')
                                           <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[2]->description }}</textarea>
                                        @error('description')
                                         <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Button Text</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('button_text') is-invalid @enderror"
                                               placeholder="Button Text" name="button_text" value="{{ $data[2]->button_text }}">
                                        @error('button_text')
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


