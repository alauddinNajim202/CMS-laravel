@extends('backend.app')

@section('title', 'Edit Expert')

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
                        <h4 class="card-title">Edit Experience</h4>
                        <div class="mt-4">
                            <form class="forms-sample" action="{{ route('experiences.update', ['id' => $data->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="row mb-2">
                                    <div class="col-12">
                                        <div
                                            class="form-group
                                        @error('expert_id') has-danger @enderror">
                                            <label class="form-lable required">Expert Name:</label>
                                            <select class="form-control " name="expert_id">
                                                <option value="">Select Expert</option>
                                                @foreach ($experts as $expert)
                                                    <option value="{{ $expert->id }}"
                                                        @if ($data->expert_id == $expert->id) selected @endif>
                                                        {{ $expert->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('expert_id')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Name Field -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label class="form-lable required">Title:</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ $data->title }}">
                                            @error('title')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label class="form-lable required">Experience Year: (2013-2016) </label>
                                            <input type="text"
                                                class="form-control @error('year_range') is-invalid @enderror"
                                                id="year_range" name="year_range" value="{{ $data->year_range }}"
                                                placeholder="e.g 2011-2015 ">
                                            @error('year_range')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label class="form-lable required">Company Name:</label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="company_name" name="company_name" value="{{ $data->company_name }}">
                                            @error('company_name')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable">Company Logo:</label>
                                        <input class="form-control dropify @error('image_url') is-invalid @enderror"
                                            type="file" name="image_url">

                                        @error('image_url')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <a href="{{ route('experts.index') }}" class="btn btn-danger ">Cancel</a>
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
