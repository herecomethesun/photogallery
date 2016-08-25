<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Settings\SettingsContract;

class SettingsController extends Controller
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

        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('pages.settings');
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'site_email' => 'required|email',
            'site_phone' => 'required',
            'site_slogan' => 'max:200',
        ]);

        $settings = array_filter($request->all(), function($key) {
            return strpos($key, 'site_') === 0;
        }, ARRAY_FILTER_USE_KEY);

        $this->settings->set($settings);

        flash()->success('Настройки сайта обновлены.');

        return redirect()->back();
    }
}
