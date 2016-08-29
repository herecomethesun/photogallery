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
     */
    public function order(Request $request, SettingsContract $settings)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:50|email',
            'phone' => 'required|max:50',
        ]);

        list($name, $email, $phone) = array_values($request->only(['name', 'email', 'phone']));

        Mail::to($settings->get('site_email'))
            ->send(new OrderEmail($name, $email, $phone));

        flash()->success('Ваша заявка получена. Спасибо.');

        return redirect()->back();
    }
}
