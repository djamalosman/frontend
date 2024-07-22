@foreach ($data as $value)
    <div class="text-center card-grid-2-image">
        <a href="/detail-course/{{$value->id}}">
            <figure><img alt="jobhub" src="{{ asset('assets/imgs/jobs/job-1.png')}}" /></figure>
        </a>
        <label class="btn-urgent" hidden>Urgent</label>
    </div>
    <div class="card-block-info">
        <div class="row">
            <div class="col-lg-7 col-6">
                <a href="/detail-course/{{$value->id}}">
                <span class="card-text-price"> {{$value->registrationfee}} </span>
                </a>
            </div>
            <div class="col-lg-5 col-6 text-end">
                <a href="/detail-course/{{$value->id}}">
                    <span class="btn btn-grey-small disc-btn">{{$value->typeonlineofline}}</span>
                </a>
            </div>
        </div>
        <h5 class="mt-10"><a href="/detail-course/{{$value->id}}">{{$value->traning_name}}</a></h5>
        <div class="mt-0">
            <a href="/detail-job/{{$value->id}}">
            <span class="card-grid-2-img-small">{{ \Carbon\Carbon::parse($value->startdate)->format('d M Y') }}</span>
            </a>
        </div>
        <div class="mt-0">
            <a href="/detail-course/{{$value->id}}">
            <span class="card-grid-2-img-small">Category {{$value->category}}</span>
            </a>
        </div>
        <div class="mt-0">
            <a href="/detail-course/{{$value->id}}">
            <span class="card-grid-2-img-small">Certified By {{$value->cetificate_type}}</span>
            </a>
        </div>
        <div class="card-2-bottom mt-0">
            <div class="row">
                <div class="col-lg-7 col-8"></div>
                <div class="col-lg-5 col-4 text-end">
                    <span><a href="{{$value->link_pendaftaran}}" style="color: #0a58ca" target="_blank">Apply</a></span>
                </div>
            </div>
        </div>

    </div>
@endforeach
