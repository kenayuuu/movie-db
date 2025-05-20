@extends('layouts.main')
@section('content')
@section('navCategory','active')

<div class="col mt-5">
    <div>
<h1> Create Data Category</h1>
<form action="/category" method="POST">
    @csrf

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name"
          value="{{ old('category_name') }}" name="category_name">
          @error('category_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
          value="{{ old('description') }}" name="description">
          @error('description')
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
