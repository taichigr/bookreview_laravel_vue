@extends('layouts.app')

@section('content')
    <h1>this is search create!</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">
                        @include('error_card_list')
                        <div class="card-text">
                            <form method="POST" action="{{ route('books.store') }}">
                                @include('books.form')
                                <button type="submit" class="btn tempting-azure-gradient btn-block text-white">投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
