@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="h4">このウェブサイトの使い方</h3>
        <p>このウェブサイトは、おすすめの本を共有するサイトです。</p>
        <p>右上の投稿ボタンからは、本のタイトルとコメントを登録することができ、検索ボタンからはキーワード検索をして本を選択して投稿することができます。
            <br>(キーワードによっては出てこないことがありますが、ご了承ください。)
        </p>
        <div class="row row-cols-1 row-cols-md-2">
            @foreach($books as $book)
                @include('books.card')
            @endforeach
            {{ $books->links('pagination.default_pagination') }}
        </div>
    </div>
@endsection

