@extends('layouts.template')
@section('content')
@section('navMovie','active')

<div class="col mt-5">
    <div>
<h1> Create Data Movie</h1>
<form action="/movie" method="POST" enctype="multipart/form-data">
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
  <label class="col-sm-2 col-form-label">Category</label>
  <div class="col-sm-10">
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
      <option value="">-- Pilih Kategori --</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
          {{ $category->category_name }}
        </option>
      @endforeach
    </select>
    @error('category_id')
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
    <label class="col-sm-2 col-form-label">Cover Image</label>
    <div class="col-sm-10">
        <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
               id="cover_image" name="cover_image" accept="image/*">
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
