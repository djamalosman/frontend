@foreach ($data as $value)
    <!-- Item job -->
    <div class="card-job hover-up wow animate__animated animate__fadeIn">
        <div class="card-job-top">
            <div class="card-job-top--image">
                <figure><img alt="jobhub" src="assets/imgs/page/job/digital.png" /></figure>
            </div>
            <div class="card-job-top--info">
                <h6 class="card-job-top--info-heading"><a href="/detail-course/{{base64_encode($value->id)}}">{{$value->traning_name}}</a></h6>
                <div class="row">
                    <div class="col-lg-7">

                        <span class="card-job-top--location text-sm"><i class="fi-rr-marker"></i> {{$value->nama_provinsi}}, {{$value->lokasi}}</span>

                        <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i>Posted at : {{ \Carbon\Carbon::parse($value->startdate)->format('d M Y') }}</span>
                        <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i>Closed at : {{ \Carbon\Carbon::parse($value->enddate)->format('d M Y') }}</span>
                    </div>
                    <div class="col-lg-5 text-lg-end">
                        <span class="card-job-top--price">{{$value->registrationfee}}<span></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-job-bottom mt-25">
            <div class="row">
                <div class="col-lg-9 col-sm-8 col-12">
                    <a href="job-grid.html" class="btn btn-small background-urgent btn-pink mr-5"><span class="card-job-top--price">{{$value->typeonlineofline}}<span></span></span></a>
                </div>
                <div class="col-lg-3 col-sm-4 col-12 text-lg-end d-lg-block d-none">
                    <span><img src="assets/imgs/theme/icons/shield-check.svg" alt="jobhub"></span>
                    <span class="ml-5"><img src="assets/imgs/theme/icons/bookmark.svg" alt="jobhub"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End item job -->
@endforeach
