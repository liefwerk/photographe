<!DOCTYPE html>
<html>
<head>
  <title>Laravel 8 Uploading photo</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<div class="container mt-5">

  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  <div class="card">

    <div class="card-header text-center font-weight-bold">
      <h2>Laravel 8 Upload Photo Tutorial</h2>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" id="upload-photo" action="{{ url('save') }}" >
            @csrf <!-- {{ csrf_field() }} -->
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="photo" placeholder="Choose photo" id="photo">
                        <label for="upload-photo" class="form-label">Title of the email
                            <input type="text" name="title" class="form-control" id="upload-photo" placeholder="Blue elephant chased by a grey mice.">
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

</div>
</body>
</html>
