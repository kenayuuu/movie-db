<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{

    public function homepage(){
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies'));
    }

    public function detailmovie($id, $slug){
        $movie = Movie::find($id);
        return view('movies.detailmovie', compact('movie'));
    }

    public function index()
    {
        $dosens= Movie::latest()->paginate(5);
        return view('movies.movie',['dosens'=>$dosens]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
{
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
    if($request->hasFile('cover_image')){
        $cover = $request->file('cover_image')->store('covers', 'public');
    }
    //Simpan ke tabel movies
    Movie::create(
        [
            'title' => $validated['title'],
            'slug' => $slug,
            'year' => $validated['year'],
            'synopsis' => $validated['synopsis'],
            'category_id' => $validated['category_id'],
            'actors' => $validated['actors'],
            'cover_image' => $cover
        ]
    );
    return redirect('/')->with('success', 'Movie saved successfully !');
}

    public function edit (String $id)
    {
        $dosen = Movie::findOrFail($id);
        return view('movies.edit_delete', ['dosens' => $dosen]);
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return redirect('/movie');
    }

    public function update(Request $request, string $id)
    {
        $dosen = Movie::find($id);
        $dosen->title = $request->title;
        $dosen->synopsis = $request->synopsis;
        $dosen->actors = $request->actors;
        $dosen->update();

        return redirect('/movie');
    }

    public function show($id)
{
    $movie = Movie::with('category')->findOrFail($id);
    return view('movies.show', compact('movie'));
}

}
