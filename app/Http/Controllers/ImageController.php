<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
