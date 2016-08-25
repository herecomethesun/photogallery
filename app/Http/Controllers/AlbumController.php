<?php

namespace App\Http\Controllers;

use App\Album;
use App\Collection;
use App\Http\Requests;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Requests\AlbumRequest;
use App\Image;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Show the form for creating a new album.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $collection = Collection::findOrFail($request->input('collection_id'));

        $album = $collection->albums()->create($request->all());

        flash()->success("Альбом &laquo;{$album->title}&raquo; добавлен.");

        return redirect()->route('album.show', [$collection->id, $album->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Collection $collection
     * @param Album $album
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Collection $collection, Album $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Album $album
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AlbumRequest $request
     * @param Album $album
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $collection = Collection::findOrFail($request->input('collection_id'));

        $album->update($request->all());

        // associate with collection
        $album->collection()->associate($collection);
        $album->save();

        flash()->success("Альбом &laquo;{$album->title}&raquo; обновлён.");

        return redirect()->route('album.show', [$collection->id, $album->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        flash()->success("Альбом &laquo;{$album->title}&raquo; удалён.");

        return redirect()->route('collection.show', $album->collection->id);
    }

    /**
     * Upload images
     *
     * @param Album $album
     * @param AddPhotoRequest $request
     */
    public function upload(Album $album, AddPhotoRequest $request)
    {
        $photo = $request->file('photo');

        $storagePath = "photos/".$album->id;
        $filename = $photo->hashName();
        $path = $photo->storePublicly('public/'.$storagePath);

        \Image::make($photo)
            ->fit(300)
            ->save(storage_path("app/public/".$storagePath."/tm-".$filename));

        $album->images()->create([
            'path' => $storagePath.'/'.$filename,
            'thumbnail_path' => $storagePath.'/tm-'.$filename,
        ]);
    }
}
