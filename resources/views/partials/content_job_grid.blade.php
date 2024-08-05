@foreach($data as $value)
<div class="col-lg-4 col-md-6">
    <div class="card-grid-2 hover-up">
        <div class="text-center card-grid-2-image">
            <a href="job-single.html">
                <div class="imgGrid-container">
                       
                    <figure>
                        {{-- <img  src="assets/imgs/jobs/job-1.png" alt="jobhub" /> --}}
                        <a href="/detail-job/{{base64_encode($value->id)}}">
                            <img class="imgGrid" src="{{ asset('http://127.0.0.1:8081/storage/' . ($value->file ?? '')) }}" />
                        </a>
                    </figure>
                </div>
            </a>
        </div>
        
        <div class="card-block-info">
            <div class="row">
                <div class="col-lg-12 col-6">
                    <a href="employers-single.html" >
                        <span class="card-grid-2-img-small"><img src="assets/imgs/jobs/logos/icons-building.png" alt="jobhub" /></span> <span style="font-size: 17px">{{$value->companyName}}</span>
                    </a>
                </div>
            </div>
            <h5 class="mt-20"><a href="/detail-job/{{base64_encode($value->id)}}">{{$value->job_title}}</a></h5>
            <div class="mt-15">
                <span class="fi-rr-briefcase"> {{$value->nama_status}}</span>&nbsp;&nbsp;&nbsp;
                
            </div>
            <div class="mt-15">
                <span class="fa fa-graduation-cap"></span>{{$value->education}} &nbsp;&nbsp;&nbsp;
                <span class="fi-rr-briefcase"> {{$value->sector}}</i></span>&nbsp;&nbsp;&nbsp;
                <span class="card-time"> {{$value->name_experience_level}}</span>
            </div>
            <div class="mt-15">
                <span class="card-location"> {{$value->namaprovinsi}}</span> &nbsp;&nbsp;&nbsp;
                <span class="card-location"> {{$value->work_location}}</span>
            </div>
            <div class="mt-15">
                <span class="card-time">Closed at : {{ \Carbon\Carbon::parse($value->close_date)->format('d M Y') }}</span>
            </div>
            <div class="card-2-bottom mt-30">
                <div class="row">
                    <div class="col-lg-2 col-8">
                        
                    </div>
                    <div class="col-lg-10 col-4 text-end">
                        <span class="card-text-price"> Rp {{$value->salary}}<span>/{{$value->fee}}</span> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
