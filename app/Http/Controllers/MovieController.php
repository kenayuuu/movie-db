<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function homepage()
    {
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies'));
    }

    public function detailmovie($id, $slug)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.detailmovie', compact('movie'));
    }

    public function index()
    {
        $movies = Movie::with('category')->latest()->paginate(5);
        return view('movies.movie', compact('movies')); // sesuai dengan movie.blade.php
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        if (!Gate::allows('create-movie')) {
        abort(403, 'Akses ditolak. Hanya admin yang boleh menambah data.');
    }

        $validated = $request->validate([
            'title' => 'required|max:25',
            'year' => 'required|numeric',
            'synopsis' => 'required|max:800',
            'category_id' => 'required|exists:categories,id',
            'actors' => 'required',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp'
        ]);

        $slug = Str::slug($request->title);
        $cover = null;

        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        Movie::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'year' => $validated['year'],
            'synopsis' => $validated['synopsis'],
            'category_id' => $validated['category_id'],
            'actors' => $validated['actors'],
            'cover_image' => $cover
        ]);

        return redirect('/movie')->with('success', 'Movie saved successfully!');
    }

    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        if(Gate::allows('edit')){
        }else{
            abort(403, 'Anda bukan admin');
        }
        return view('movies.edit_delete', compact('movie'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:25',
            'synopsis' => 'required|max:800',
            'actors' => 'required'
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($validated);

        return redirect('/movie')->with('success', 'Movie updated successfully!');
    }

    public function destroy($id)
    {
        if(Gate::allows('delete')){
            Movie::destroy($id);
            echo "Delete movie $id";
            return redirect('/movie')->with('success', 'Movie deleted successfully!');
        }else{
            abort(403, 'Anda bukan admin');
        }
    }

    public function show($id)
    {
        $movie = Movie::with('category')->findOrFail($id);
        return view('movies.movie', compact('movie')); // Pastikan ada file show.blade.php
    }
}
