@foreach($job_vacancy as $jobs)
    <div class="post-list-small-item d-flex align-items-center">
        <figure class="thumb mr-15">
            <a href="/detail-job/{{$jobs->id}}"><img src="{{ asset('assets/imgs/blog/thumb-1.png')}}" alt=""></a>
        </figure>
        <div class="content">
            <a href="/detail-job/{{$jobs->id}}">
                <h5>{{$jobs->job_title}}</h5>
            </a>
            <div class="post-meta text-muted d-flex align-items-center mb-15">
                <div class="author d-flex align-items-center mr-20">
                    <a href="/detail-job/{{$jobs->id}}">
                        <span><h6>{{$jobs->nama_status}}</h6></span>
                    </a>
                </div>

            </div>

        </div>
    </div>
@endforeach
