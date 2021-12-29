
<div class="card mt-3 w-100">
    <div class="card-body w-100 d-flex flex-row row">
        <div class="view overlay col-sm-12 col-md-3">
            <img class="card-img" src="{{$book->thumbnail ?: "https://source.unsplash.com/book"}}"
                 alt="Card image cap">
            <a href="">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>
        <div class="col-sm-12 col-md-9">
            <h2 class="h4 card-title mt-3">
                <a class="text-dark" href="">
                    {{ $book->title }}
                </a>
            </h2>
            <p class="m-2">出版社：{{$book->publisher ?: '-----'}}</p>

            <div class="card-text p-2">
                <h3 class="h5">説明</h3>
                {{$book->description ?: '-----'}}
            </div>

            <div class="card-text p-2">
                <h3 class="h5">推薦者: {{ $book->user->name }}</h3>
                <h3 class="h5">コメント</h3>
                {{$book->comment ?: '-----'}}
            </div>
        </div>
    </div>
</div>


