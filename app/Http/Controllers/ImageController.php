<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests;
use App\Image;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Album $album
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Album $album)
    {
        $images = $album->images()->paginate(20);

        return view('image.index', compact('album', 'images'));
    }

    /**
     * @param Album $album
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Album $album)
    {
        return view('image.create', compact('album'));
    }

    /**
     * Destroy the image
     *
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Image $image)
    {
        $image->delete();

        flash()->success('Изображение удалено');

        return redirect()->back();
    }

    /**
     * Destroy the image
     *
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Image $image, Request $request)
    {
        $image->update($request->all());

        flash()->success('Изображение сохранено');

        return redirect()->back();
    }

    /**
     * Upload image from ckeditor
     *
     * @param Request $request
     * @param Factory $validator
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function upload(Request $request, Factory $validator)
    {
        $v = $validator->make($request->all(), [
            'upload' => 'required|image',
        ]);

        $funcNum = $request->input('CKEditorFuncNum');

        if ($v->fails()) {
            return response(
                "<script>
                    window.parent.CKEDITOR.tools.callFunction({$funcNum}, '', '{$v->errors()->first()}');
                </script>"
            );
        }

        $image = $request->file('upload');
        $image->store('public/uploads');
        $url = asset('storage/uploads/'.$image->hashName());

        return response(
            "<script>
                window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}', 'Изображение успешно загружено');
            </script>"
        );
    }
}
