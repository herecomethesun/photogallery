<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Mail\OrderEmail;
use App\Settings\SettingsContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @param SettingsContract $settings
     * @return \Illuminate\Http\RedirectResponse
     */
    public function order(Request $request, SettingsContract $settings)
    {
        $this->validate($request, [
            'name'      => 'required|max:100',
            'email'     => 'required|max:50|email',
            'phone'     => 'required|max:50',
            'adress'     => 'max:150',
            'map'     => 'max:500',
            'how'     => 'max:1000',
            'message'   => 'max:1000',
            'image' => 'required',
        ]);

        list($name, $email, $phone, $message) = array_values($request->only(['name', 'email', 'phone', 'message']));

        $image = $request->get('image');

        Mail::to($settings->get('site_email'))
            ->send(new OrderEmail($name, $email, $phone, $message, $image));

        return response()->json([
            'status' => 'success'
        ]);
    }
}
