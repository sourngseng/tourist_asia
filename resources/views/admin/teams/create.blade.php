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
        <h1>{{ trans('global.create') }} {{ trans('menu.guides') }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ trans('global.create') }} {{ trans('menu.guides') }}</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endpush

@section('content')

<form action="{{ route('guide.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-8">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h4 class="float-left">{{ trans('global.create') }} {{ trans('menu.guides') }}</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Name</label>
                <div class="input-group">
                  <input name="title" class="form-control form-control-lg" type="text" placeholder="SENG Sourng">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="position">Position</label>
                <div class="input-group">
                  <input name="position" class="form-control form-control-lg" type="text" placeholder="Tour Leader">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="detail">Bio</label>
            <div class="input-group">
              <textarea style="width: 100%;" id="summernote" name="detail"
                class="form-control form-control-lg"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="location">Phone</label>
                <div class="input-group">
                  <input name="phone" class="form-control form-control-lg" type="text" placeholder="092771244">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="location">Email</label>
                <div class="input-group">
                  <input name="email" class="form-control form-control-lg" type="text" placeholder="nqWJ8@example.com">
                </div>
              </div>
            </div>
          </div>

          {{-- Facebook --}}
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <div class="input-group">
              <input name="facebook" id="facebook" class="form-control form-control-lg" type="text"
                placeholder="https://facebook.com/">
            </div>
          </div>
          <div class="form-group">
            <label for="twitter">Social X</label>
            <div class="input-group">
              <input name="twitter" id="twitter" class="form-control form-control-lg" type="text"
                placeholder="https://x.com/">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h4 class="float-left">{{ trans('global.action') }} {{ trans('menu.guides') }}</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputFile">Upload Photo</label>
            <div class="input-group">
              <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="location">Location</label>
            <div class="input-group">
              <select class="form-control" id="location" name="location">
                @foreach ($provinces as $item)
                <option value="{{ $item->id }}">{{ $item->khmer_name }}-{{ $item->name }}</option>
                @endforeach
              </select>

            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Status</label>
            <div class="input-group">
              <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger"
                data-on-color="success">
            </div>
          </div>

          <br>

          <input type="submit" class="btn btn-primary btn-block" value="Save">
          <a href="{{ route('guide.index') }}" class="btn btn-danger btn-block">Cancel</a>
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
    toolbar: [
          ['style', ['style']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        
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