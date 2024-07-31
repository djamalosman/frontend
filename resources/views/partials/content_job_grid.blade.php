@foreach ($data as $value)
 <div class="col-lg-4 col-md-6">
    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".0s">
        <div class="text-center card-grid-2-image">
            <a href="job-single.html">
                <figure><img alt="jobhub" src="assets/imgs/jobs/job-1.png" /></figure>
            </a>
            <label class="btn-urgent"> {{$value->nama_status}}</label>
        </div>
        <div class="card-block-info">
            <div class="row">
                <div class="col-lg-7 col-6">
                    <a href="/detail-job/{{$value->id}}" class="card-2-img-text">
                        <span class="card-grid-2-img-small"><img alt="jobhub" src="assets/imgs/jobs/logos/logo-1.svg" /></span>
                        <span>{{$value->companyName}}</span>
                    </a>
                </div>
            </div>
            <h5 class="mt-20"><a href="/detail-job/{{$value->id}}">{{ $value->job_title }}</a></h5>
            <div class="mt-15">
                <span class="card-time">Posted at : {{ \Carbon\Carbon::parse($value->posted_date)->format('d M Y') }}</span>
                <span class="card-time">Closed at : {{ \Carbon\Carbon::parse($value->close_date)->format('d M Y') }}</span>
{{--                <span class="card-time">3 mins ago</span>--}}
{{--                <span class="card-location">Chicago</span>--}}
            </div>
            <div class="card-2-bottom mt-30">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <span class="card-text-price"> {{$value->salary}}<span>/{{$value->fee}}</span> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
