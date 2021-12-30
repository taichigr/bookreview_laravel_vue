<template>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header tempting-azure-gradient text-white">本の検索</div>

            <div class="card-body">
                <div class="form-group row">
                    <input v-model="inputText" type="text" class="form-control" placeholder="検索">
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button v-on:click="searchBook" class="btn btn-primary tempting-azure-gradient text-white">
                            検索
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-col-md-7">

            <div class="card mt-3 w-100" v-for="(item, index) in bookItems" :key="item.id">
                <div class="card-body w-100 d-flex flex-row row">
                    <div class="view overlay col-sm-12 col-md-3">
                        <img class="card-img" :src="`${item.volumeInfo.imageLinks.smallThumbnail}`"
                             alt="Card image cap">
                        <a href="">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <h2 class="h4 card-title mt-3">
                            <a class="text-dark" href="">
                                {{ item.volumeInfo.title }}
                            </a>
                        </h2>
                        <h2 class="h4 mt-3">
                            <a class="text-dark" href="">
                                {{ item.volumeInfo.authors[0] }}
                            </a>
                        </h2>

                        <div class="card-text p-2">
                            <h3 class="h5">説明</h3>
                            {{ item.volumeInfo.description }}
                        </div>
                        <div class="col-md-6 offset-md-4">

                            <button type="button" class="btn btn-primary tempting-azure-gradient text-white" data-toggle="modal" data-target="#Modal">
                                選択
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">コメント入力</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="h6 card-title mt-3">
                                                    {{ item.volumeInfo.title }}
                                            </h2>
                                            <div class="form-group">
                                                <label></label>
                                                <textarea v-model="comment" name="comment" required class="form-control" rows="16" placeholder="コメント"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">閉じる</button>
                                            <button @click="postForm(index)" type="button" class="btn btn-primary tempting-azure-gradient">投稿</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






</template>

<script>
// TODO axiosができたので、データに基づいて、画面作り
// TODO 本の情報を引き継いで、create画面に持っていく。
import axios from "axios";

export default {
    props: {
      endpoint: {
          type: String
      },
        redirectEndpoint: {
            type: String
        },
    },
    data() {
        return {
            inputText: "",
            googlebooksapi: 'https://www.googleapis.com/books/v1/volumes?q=',
            bookItems: [],
            comment: ""
        }
    },
    methods: {
        async searchBook() {
            const response = await axios.get(`${this.googlebooksapi}${this.inputText}`)
            this.bookItems = response.data.items
            this.inputText = ""
        },
        async postForm(index) {
            //TODO title, author, publisher, details, thumbnailを伝えたい。
            console.log("ページ遷移")
            console.log(this.endpoint)
            const bookData = this.bookItems[index]
            const article = {
                'title' : bookData.volumeInfo.title,
                'author' : bookData.volumeInfo.authors[0],
                'description': bookData.volumeInfo.description,
                'comment': this.comment,
                'thumbnail': bookData.volumeInfo.imageLinks.smallThumbnail,
            }
            console.log(article)
            await axios.post(this.endpoint, article)
                .then(res => console.log('seccuess')
                )
                .catch(error => console.log(error))
            console.log(this.redirectEndpoint)
            window.location.href = this.redirectEndpoint
        }
    },
}
</script>

