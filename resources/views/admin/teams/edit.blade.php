@extends('layouts.admin_app')
@push('styles')
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet"
    href="{{ asset('admin_assets') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="{{ asset('admin_assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/adminlte.min.css">
{{-- Summer Note --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@push('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.edit') }} {{ trans('menu.packages') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ trans('global.edit') }} {{ trans('menu.packages') }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endpush

@section('content')

<form action="{{ route('package.update',$package->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4 class="float-left">{{ trans('global.edit') }} {{ trans('menu.packages') }}</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Package Title</label>
                        <div class="input-group">
                            <input name="title" id="title" value="{{ $package->title }}"
                                class="form-control form-control-lg" type="text" placeholder="Package Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <div class="input-group">
                            <textarea style="width: 100%;" id="summernote" name="detail"
                                class="form-control form-control-lg">{{ $package->detail }}</textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <div class="input-group">
                            <select class="form-control" id="location" name="province_id">
                                @foreach ($provinces as $item)
                                <option {{ $package->province_id == $item->id ? 'selected' : '' }} value="{{ $item->id
                                    }}">{{
                                    $item->khmer_name }}-{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Duration</label>
                        <div class="input-group">
                            <input name="duration" value="{{ $package->duration }}" class="form-control form-control-lg"
                                type="number" min="1" placeholder="7">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Guest Amount</label>
                        <div class="input-group">
                            <input name="guest" value="{{ $package->guest }}" class="form-control form-control-lg"
                                type="number" min="1" placeholder="Guest Number, e.g 2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Package Price</label>
                        <div class="input-group">
                            <input name="price" value="{{ $package->price }}" class="form-control form-control-lg"
                                type="number" min="1" placeholder="Package Price">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4 class="float-left">{{ trans('global.action') }} {{ trans('menu.packages') }}</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <img class="img-thumbnail" src="{{ url('storage/package/'.$package->photo) }}"
                            alt="{{ $package->photo }}">
                        <label for="upload_file">Upload Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" name="old_image" value="{{ $package->photo }}">
                                <input name="image" type="file" class="custom-file-input" id="upload_file">
                                <label class="custom-file-label" for="upload_file">Choose Image</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="checkbox">Status</label>
                        <div class="input-group">
                            <input type="checkbox" id="checkbox" name="status" checked data-bootstrap-switch
                                data-off-color="danger" data-on-color="success">
                        </div>
                    </div>
                    <br>

                    <input type="submit" class="btn btn-primary" value="Save">
                    <a href="{{ route('package.index') }}" class="btn btn-danger">Cancel</a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
</form>

@endsection


@push('scripts')

<!-- Select2 -->
<script src="{{ asset('admin_assets') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('admin_assets') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('admin_assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('admin_assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admin_assets') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin_assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admin_assets') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{ asset('admin_assets') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{ asset('admin_assets') }}/plugins/dropzone/min/dropzone.min.js"></script>

{{-- Summernote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $('#summernote').summernote({
    placeholder: 'Detail your package',
    tabsize: 4,
    // width:100%,
    width: 1050,
    height: 400,
    // toolbar: [
    //       ['style', ['style']],
    //       ['font', ['strikethrough', 'superscript', 'subscript']],
    //       ['font', ['bold', 'underline', 'clear']],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']],
    //       ['table', ['table']],
    //       ['insert', ['link', 'picture', 'video']],
    //       ['view', ['fullscreen', 'codeview', 'help']]
    //     ]
  });
</script>

<script>
    $(function () {    
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
  
    })
  
</script>
@endpush