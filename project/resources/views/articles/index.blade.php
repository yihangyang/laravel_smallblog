@extends('layouts/article')

@section('main')
    <div class="font-thin text-4xl-">Article List</div>
    <a href="{{ route('articles.create') }}">new Article</a>
    @foreach($articles as $article)
        <div class="border-t border-grey-300 my-1 p-2">
            <h2 class="font-bold text-lg">
                <a href="{{ route('articles.show', $article) }}">
                    {{ $article->title }}
                </a>
            </h2>
            <p>
                {{ $article->created_at }} from {{ $article->user->name }} uploaded
            </p>
            <div class="flex">
                <a class="mr-2 px-2 rounded bg-blue-500 text-red-100" href="{{ route('articles.edit', ['article' => $article->id]) }}">Edit</a>
                <form action="{{ route('articles.destroy', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-2 rounded bg-red-500 text-red-100">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection
