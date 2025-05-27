@extends('layouts.template')

@section('content')
@section('title','Edit Data Movie')
@section('navMovie','active')
<div class="row">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-12">
            <h1 class="h2">Edit Data Category</h1>
            <form action="{{ route('dsn.update',$dosens->id) }}" method="post">
                @csrf
                @method("PUT")

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $dosens->title }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                    <div class="col-sm-10">
                        <input type="text" name="synopsis" class="form-control @error('synopsis') is-invalid @enderror"   id="synopsis" value="{{ $dosens->synopsis }}">
                        @error('synopsis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="actors" class="col-sm-2 col-form-label">Actors</label>
                    <div class="col-sm-10">
                        <input type="text" name="actors" class="form-control @error('actors') is-invalid @enderror"   id="actors" value="{{ $dosens->actors }}">
                        @error('actors')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
