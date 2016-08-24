<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Show collection
     *
     * @param Collection $collection
     */
    public function show(Collection $collection)
    {
        return view('collections.show', compact('collection'));
    }
}
