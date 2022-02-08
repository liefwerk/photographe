<!DOCTYPE html>
<html>
<head>
    <title>Photograph 🎥</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5">

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="display-1 mb-5">Photograph</h1>

    @if (count($photos))
        <a href="/upload-image" class="d-block mb-4">upload another one</a>
        @foreach ($photos as $key => $value)
            <form action="{{ route('photo.destroy', $value->id) }}" method="POST">
                <div class="position-relative">
                    <img class="img-fluid rounded" src="{{URL::to('/')}}{{$value->path}}" />
                    <p>{{ $value->title }}</p>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger position-absolute top-0 end-0">
                        <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>
        @endforeach
    @else
        <p>There are no photos at the moment.</p>
        <a href="/upload-image">upload one now</a>
    @endif


</div>
</body>
</html>
