
@foreach ($data as $value)

<div class="card-job hover-up wow animate__animated animate__fadeIn">
    <div class="card-job-top">
        <div class="card-job-top--image">
            <a href="/detail-job/{{$value->id}}">
                <figure><img alt="jobhub" src="{{ asset('assets/imgs/page/job/digital.png')}}" /></figure>
            </a>
        </div>
        <div class="card-job-top--info">

            <h6 class="card-job-top--info-heading"><a href="/detail-news/{{$value->id}}">{{ $value->title }}</a></h6>
            
        </div>
        <div class="card-job-top--info">
            <div class="row">
                <div class="col-lg-12">

                    <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i>Posted at : {{ \Carbon\Carbon::parse($value->implementation_date)->format('d M Y') }}</span>
                </div>
            </div>
        </div>
        <div class="card-job-bottom mt-25">
            <div class="row">
                <div class="col-lg-9 col-sm-8 col-12">
                    <a href="job-grid.html" class="btn btn-small background-urgent btn-pink mr-5"><span class="card-job-top--price">{{$value->jenisBerita}}<span></span></span></a>
                </div>
                <div class="col-lg-3 col-sm-4 col-12 text-lg-end d-lg-block d-none">
                    <span><img src="assets/imgs/theme/icons/shield-check.svg" alt="jobhub"></span>
                    <span class="ml-5"><img src="assets/imgs/theme/icons/bookmark.svg" alt="jobhub"></span>
                </div>
            </div>
        </div>
    </div>
    

</div>
@endforeach
