<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index','show']);
    }
    public function index() {
        $articles = Article::with('user')->orderBy('id','desc')->paginate(3);
        return view('articles/index', ['articles' => $articles]);
    }

    public function show($id) {
        $article = Article::find($id);
        return view('articles.show',['article' => $article]);

    }

    public function create() {
        return view('articles/create');
    }

    public function store(Request $request) {
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);
//        if(!auth()->user()) {
//            with('notice', 'Add article successfully');
//        }
        auth()->user()->articles()->create($content);
        return redirect()->route('root')->with('notice', 'Add article successfully');
    }

    public function edit($id) {
        $article = auth()->user()->articles()->find($id);
        return view('articles.edit', ['article' => $article]);
    }
    public function update(Request $request, $id) {
        $article = auth()->user()->articles()->find($id);
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);
        $article->update($content);
        return redirect()->route('root')->with('notice', 'Update article successfully');
    }

    public function destroy($id) {
        $article = auth()->user()->articles()->find($id);
        $article->delete();
        return redirect()->route('root')->with('notice','Delete article successfully');

    }
}
