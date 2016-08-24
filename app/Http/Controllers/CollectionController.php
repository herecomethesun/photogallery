<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests;
use App\Http\Requests\CollectionRequest;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => 'show',
        ]);
    }

    /**
     * Show collection
     *
     * @param Collection $collection
     */
    public function show(Collection $collection)
    {
        return view('collections.show', compact('collection'));
    }

    /**
     * Create new colоlection
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('collections.create');
    }

    /**
     * Store the collection
     *
     * @param CollectionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CollectionRequest $request)
    {
        $collection = Collection::create($request->all());

        flash()->success("Коллекция &laquo;{$collection->title}&raquo; добавлена");

        return redirect()->route('collection.show', compact('collection'));
    }

    /**
     * Edit collection
     *
     * @param Collection $collection
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Collection $collection)
    {
        return view('collections.edit', compact('collection'));
    }

    /**
     * Update the collection
     *
     * @param Collection $collection
     * @param CollectionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Collection $collection, CollectionRequest $request)
    {
        $collection->update($request->all());

        flash()->success("Коллекция &laquo;{$collection->title}&raquo; обновлена");

        return redirect()->route('collection.show', compact('collection'));
    }

    /**
     * Destroy the collection
     *
     * @param Collection $collection
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();

        flash()->success("Коллекция &laquo;{$collection->title}&raquo; удалена");

        return redirect()->route('front');
    }
}
