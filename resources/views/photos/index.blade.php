@extends('layout')

@section('content')

    <h1 class="display-1 mb-5">Photograph</h1>

    @if (count($photos))
        <a href="/upload-image" class="d-block mb-4">upload another one</a>
        @foreach ($photos as $key => $value)
            <form action="{{ route('photo.destroy', $value->id) }}" method="POST">
                <div class="position-relative">
                    <img class="img-fluid rounded" alt="{{ $value->title }}" src="{{URL::to('/')}}{{$value->path}}" />
                    <img class="img-fluid rounded" alt="{{ $value->title }}" src="{{URL::to('/')}}{{$value->path_150px}}" />
                    <p>{{ $value->title }}</p>

                    @csrf
                    @method('DELETE')
                </div>
                <button type="submit" class="btn btn-danger d-flex">
                    <span class="small align-self"><strong>DELETE IMAGE</strong></span>
                    <svg  class="align-self" width="22" height="22" stroke-width="2" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
        @endforeach
    @else
        <p>There are no photos at the moment.</p>
        <a href="/upload-image">upload one now</a>
    @endif

@endsection
