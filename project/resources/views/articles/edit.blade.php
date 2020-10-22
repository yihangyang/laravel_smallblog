@extends('layouts/article')

@section('main')
    <div class="font-thin text-4xl-">Article List > Edit Article</div>


    @if($errors->any())
        <div class="errors p-3 bg-red-500 text-red-100 fond-thin rounded">
            <ul>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article) }}" method="post">
        @csrf
        @method('patch')
        <div class="field my-2">
            <label for="">Title</label>
            <input type="text" value="{{ $article->title }}" name="title" class="border border-grey-300 p-2 ml-7">
        </div>

        <div class="field my-2">
            <label for="">Content</label>
            <textarea name="content" cols="30" rows="10" class="border border-grey-300 p-2">{{ $article->content }}</textarea>
        </div>

        <div class="actions">
            <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-blue-300">Update</button>
        </div>
    </form>
@endsection
