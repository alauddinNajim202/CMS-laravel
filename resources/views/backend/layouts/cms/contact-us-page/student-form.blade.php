@extends('backend.app')

@section('title', 'Contact Number')

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
                        <h4 class="card-title">Contact Number Section</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.student-form.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="1">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Contact Number 1</label>
                                        <input type="text"
                                            class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                            placeholder="Contact Number 1" name="title" value="{{ $data[0]->title }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Contact Number 2</label>
                                        <input type="text"
                                            class="form-control form-control-md border-left-0 @error('sub_title') is-invalid @enderror"
                                            placeholder="Contact Number 2" name="sub_title" value="{{ $data[0]->sub_title }}">
                                        @error('sub_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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