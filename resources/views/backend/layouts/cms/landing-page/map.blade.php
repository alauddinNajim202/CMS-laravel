@extends('backend.app')

@section('title', 'Available Preceptor')

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
                        <h4 class="card-title">Available Preceptor Map Section</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.landing-page.map.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="15">


                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Map Location <code>*embed map link</code></label>
                                        <input type="text"
                                            class="form-control form-control-md border-left-0 @error('link_url') is-invalid @enderror"
                                            placeholder="Provide embed location map link" name="link_url" value="{{ $data[14]->link_url }}">
                                        @error('link_url')
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
