@extends('backend.app')

@section('title', 'What Will You Get')

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
                        <h4 class="card-title">What Will You Get</h4>

                        <h4 class="card-title mt-5">Card One</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.card-one.update') }}" method="POST"
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
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[2]->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                        <h4 class="card-title mt-5">Card Two</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.card-two.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="4">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[3]->title }}">
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[3]->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                        <h4 class="card-title mt-5">Card Three</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.card-three.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="5">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[4]->title }}">
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[4]->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                        <h4 class="card-title mt-5">Card Four</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.card-four.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="6">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[5]->title }}">
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[5]->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                        <h4 class="card-title mt-5">Card Five</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.card-five.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="7">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[6]->title }}">
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[6]->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                        <h4 class="card-title mt-5">Card Six</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.card-six.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="8">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[7]->title }}">
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[7]->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                        <h4 class="card-title mt-5">Card Seven</h4>
                        <div class="mt-4">
                            <form action="{{ route('cms.card-seven.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="9">

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Title</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" value="{{ $data[8]->title }}">
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ $data[8]->description }}</textarea>
                                        @error('description')
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
        // ClassicEditor
        //     .create(document.querySelector('#description'), {
        //         height: '500px'
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        // ClassicEditor
        //     .create(document.querySelector('#description1'), {
        //         height: '500px'
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });


        $('.dropify').dropify();



        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush


