@extends('layout')

@section('content')

  <div class="card">

    <div class="card-header text-center font-weight-bold">
      <h1>Laravel 8 Upload Photo Tutorial</h1>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" id="upload-photo" action="{{ url('save') }}" >
            @csrf <!-- {{ csrf_field() }} -->
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="photo" placeholder="Choose photo" id="photo">
                        <label for="upload-photo" class="form-label">Title of the email
                            <input type="text" name="title" class="form-control" id="photo-title" placeholder="Blue elephant chased by a grey mice.">
                        </label>
                        @error('photo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>
        </form>

    </div>
  </div>

@endsection
