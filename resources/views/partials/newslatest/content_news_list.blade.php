<style>
    .post-title {

        font-weight: bold;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 2.8;
        /* Adjust this value if necessary */
        height: 4em;
    }
</style>
@foreach ($data as $value)
    <div class="col-lg-4 mb-30">
        <div class="card-blog-1 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <figure class="post-thumb mb-15">
                <a href="blog-single.html">
                    <img alt="jobhub" src="assets/imgs/blog/blog-thumb-3.png" />
                </a>
            </figure>
            <div class="card-block-info">

                <h3 class="post-title small mb-15 "><a href="/detail-news/{{$value->id}}">{{$value->title}}</a></h3>
                <div class="card-2-bottom mt-30">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="keep-reading">
                            <a href="/detail-news/{{$value->id}}" class="btn btn-border btn-brand-hover">{{$value->jenisBerita}}</a>
                        </div>
                        <div class="tags text-lg-end">
                            <span class="card-time">Posted at : {{ \Carbon\Carbon::parse($value->implementation_date)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
