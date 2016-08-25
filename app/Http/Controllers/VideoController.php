<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

class VideoController extends Controller
{
    public function edit()
    {
        return view('video.edit');
    }

    public function upload(Request $request, Filesystem $filesystem)
    {
        $this->validate($request, [
            'video' => 'required|file|max:10000',
        ]);

        // delete old videos
        $videos = $filesystem->allFiles('public/videos');
        $filesystem->delete($videos);

        $video = $request->file('video');
        $path = $video->storeAs('videos', $video->hashName(), 'public');

        flash()->success('Видео успешно загружено');

        return redirect()->back();
    }
}
