<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Settings\SettingsContract;
use Illuminate\Contracts\Filesystem\Filesystem;

class VideoController extends Controller
{
    /**
     * @var SettingsContract
     */
    private $settings;

    /**
     * @param SettingsContract $settings
     */
    public function __construct(SettingsContract $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Show upload video page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('video.edit');
    }

    /**
     * Upload video
     *
     * @param Request $request
     * @param Filesystem $filesystem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request, Filesystem $filesystem)
    {
        $this->validate($request, [
            'video' => 'required|file|max:11000',
        ]);

        // delete old videos
        $videos = $filesystem->allFiles('public/videos');
        $filesystem->delete($videos);

        $video = $request->file('video');
        $path = $video->storeAs('videos', $video->hashName(), 'public');

        $this->settings->set('video_url', $path);

        flash()->success('Видео успешно загружено');

        return redirect()->back();
    }
}
