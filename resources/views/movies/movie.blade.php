@extends('layouts.main')
@section('title','Data Movie')
@section('navMovie','active')

@section('content')
<h1>Daftar Movie :</h1>
<a href="/movie/create" class="btn btn-primary mb-3"> Input Data Movie</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Synopsis</th>
        <th>Actors</th>
        <th>Image</th>
        <th>Aksi</th>
    </tr>

    @foreach ($dosens as $dosen)
<tr>
    <td>{{ $dosens->firstItem()+$loop->index}}</td>
    {{-- <td>{{ $mahasiswa -> id}}</td> --}}
    <td>{{ $dosen -> title}}</td>
    <td>{{ $dosen -> synopsis}}</td>
    <td>{{ $dosen -> actors}}</td>
    <td>
        <img src="{{ $dosen->cover_image }}" alt="{{ $dosen->title }}" width="100">
    </td>

    <td>
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
