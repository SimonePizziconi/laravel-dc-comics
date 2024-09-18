<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'series' => 'required|min:5|max:255',
                'thumb' => 'required|url|max:255',
                'price' => 'required|min:0',
                'type' => 'required|min:3|max:30',
            ],

            [
                'series.required' => 'Il campo nome fumetto è obbligatorio.',
                'series.min' => 'Il campo nome fumetto deve avere :min caratteri.',
                'series.max' => 'Il campo nome fumetto può avere :max caratteri.',
                'thumb.required' => 'Il campo copertina fumetto è obbligatorio.',
                'thumb.url' => 'Inserisci un URL valido per la copertina.',
                'thumb.max' => 'Il campo copertina fumetto può avere :max caratteri.',
                'price.required' => 'Il campo prezzo è obbligatorio.',
                'price.min' => 'Il prezzo deve essere almeno :min.',
                'type.required' => 'Il campo tipo fumetto è obbligatorio.',
                'type.min' => 'Il campo tipo fumetto deve avere :min caratteri.',
                'type.max' => 'Il campo tipo fumetto può avere :max caratteri.',
            ]
        );


        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['series'], Comic::class);

        $new_comic = Comic::create($data);






        return redirect()->route('comics.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $comic->update($data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', 'Il fumetto ' . $comic->series . ' è stato eliminato correttamente');
    }
}
