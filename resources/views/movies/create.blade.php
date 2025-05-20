@extends('layouts.main')
@section('content')
@section('navMovie','active')

<div class="col mt-5">
    <div>
<h1> Create Data Movie</h1>
<form action="/movie" method="POST">
    @csrf

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
          value="{{ old('title') }}" name="title">
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Slug</label>
        <div class="col-sm-10">
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
          value="{{ old('slug') }}" name="slug">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Synopsis</label>
        <div class="col-sm-10">
          <input type="text" class="form-control @error('synopsis') is-invalid @enderror" id="synopsis"
          value="{{ old('synopsis') }}" name="synopsis">
          @error('synopsis')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Year</label>
        <div class="col-sm-10">
          <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
          value="{{ old('year') }}" name="year">
          @error('year')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Actors</label>
        <div class="col-sm-10">
          <input type="text" class="form-control @error('actors') is-invalid @enderror" id="actors"
          value="{{ old('actors') }}" name="actors">
          @error('actors')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Image URL</label>
        <div class="col-sm-10">
            <input type="url" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
            value="{{ old('cover_image') }}" name="cover_image" placeholder="Enter image URL">
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
