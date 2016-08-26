<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'edit']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function front()
    {
        return view('pages.front');
    }

    /**
     * Brand about page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function brand()
    {
        return $this->getPage('brand');
    }

    /**
     * About designer page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function designer()
    {
        return $this->getPage('designer');
    }

    /**
     * Contacts page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts()
    {
        return view('pages.contacts');
    }

    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getPage($name)
    {
        $page = Page::findByName($name);

        return view('pages.'.$page->template, compact('page'));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * @param Page $page
     * @param Request $request
     */
    public function update(Page $page, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->update($request->all());

        flash()->success("Страница &laquo;{$page->title}&raquo; обновлена.");

        return redirect()->route($page->route);
    }
}
