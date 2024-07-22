@foreach($news as $item)
    <div class="post-list-small-item d-flex align-items-center">
        <figure class="thumb mr-15">
            <img src="{{ asset('assets/imgs/blog/thumb-1.png')}}" alt="">
        </figure>
        <div class="content">
            <h5>{{$item->title}}</h5>
            <div class="post-meta text-muted d-flex align-items-center mb-15">
                <div class="author d-flex align-items-center mr-20">
                    <span>{{$item->category}}</span>
                </div>
                <div class="date">
                    <span>{{ \Carbon\Carbon::parse($item->implementation_date)->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
