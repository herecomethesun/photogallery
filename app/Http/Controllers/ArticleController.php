<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var Article
     */
    private $article;

    /**
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            $articles = $this->article->latest()->paginate(5);
        } else {
            $articles = $this->article->published()->latest()->paginate(5);
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $article = $this->article->create($request->all());

        flash()->success("Новость &laquo;{$article->title}&raquo; добавлена.");

        return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        abort_if( ! $article->published && ! auth()->check(), 403);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        flash()->success("Новость &laquo;{$article->title}&raquo; обновлена.");

        return redirect()->route('article.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        flash()->success("Новость &laquo;{$article->title}&raquo; удалена.");

        return redirect()->route('article.index');
    }
}
