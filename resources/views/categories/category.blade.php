@extends('layouts.main')
@section('title','Data Category')
@section('navCategory','active')

@section('content')
<h1>Daftar Category :</h1>
<a href="/category/create" class="btn btn-primary mb-3"> Input Data Category</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Aksi</th>
    </tr>

    @foreach ($dosens as $dosen)
<tr>
    <td>{{ $dosens->firstItem()+$loop->index}}</td>
    {{-- <td>{{ $mahasiswa -> id}}</td> --}}
    <td>{{ $dosen -> category_name}}</td>
    <td>{{ $dosen -> description}}</td>
    <td>
        <!-- Tombol Edit -->
        <a href="{{ route('category.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>

        <!-- Tombol Hapus -->
        <form action="{{ route('category.destroy', $dosen->id) }}" method="POST" style="display:inline-block;">
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
