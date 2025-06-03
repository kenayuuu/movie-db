@extends('layouts.template')
@section('title','Data Movie')
@section('navMovie','active')

@section('content')
<h1>Daftar Movie :</h1>
<a href="/movie/create" ></a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Category</th>
        <th>Actors</th>
        {{-- <th>Image</th> --}}
        <th>Aksi</th>
    </tr>

    @foreach ($dosens as $dosen)
<tr>
    <td>{{ $dosens->firstItem()+$loop->index}}</td>
    {{-- <td>{{ $mahasiswa -> id}}</td> --}}
    <td>{{ $dosen -> title}}</td>
    <td>{{ $dosen->category->category_name }}</td>
    <td>{{ $dosen -> actors}}</td>
    {{-- <td>
        @if ($dosen->cover_image)
            <img src="{{ asset('storage/' . $dosen->cover_image) }}" alt="{{ $dosen->title }}" class="img-fluid" width="100">
        @else
            <span class="text-muted">No Image</span>
        @endif
    </td> --}}



    <td>
        <a href="{{ route('movie.detail', ['id' => $dosen->id, 'slug' => Str::slug($dosen->title)]) }}" class="btn btn-info btn-sm">Show</a>
        <!-- Tombol Edit -->
        <a href="{{ route('movie.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <!-- Tombol Hapus -->
        <form action="{{ route('movie.destroy', $dosen->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
        </form>
    </td>

</tr>

@endforeach
</table>
{{ $dosens->links() }}
@endsection
