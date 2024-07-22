
    @foreach ($data as $value)

        <div class="card-job hover-up wow animate__animated animate__fadeIn">
            <div class="card-job-top">
                <div class="card-job-top--image">
                    <a href="/detail-job/{{$value->id}}">
                        <figure><img alt="jobhub" src="{{ asset('assets/imgs/page/job/digital.png')}}" /></figure>
                    </a>
                </div>
                <div class="card-job-top--info">

                    <h6 class="card-job-top--info-heading"><a href="/detail-job/{{$value->id}}">{{ $value->job_title }}</a></h6>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="/detail-job/{{$value->id}}"> <a href="/detail-job/{{$value->id}}"><span class="card-job-top--company">Nama Perusahaan</span></a></a>
                            <span class="card-job-top--type-job text-sm"><i class="fi-rr-briefcase"></i> {{$value->nama_status}}</span>
                            <span class="card-job-top--location text-sm"><i class="fi-rr-marker"></i> {{$value->work_location}}</span>
                        </div>

                    </div>
                </div>
                <div class="card-job-top--info">
                    <div class="row">
                        <div class="col-lg-12">

                            <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i>Posted at : {{ \Carbon\Carbon::parse($value->posted_date)->format('d M Y') }}</span>
                            <span class="card-job-top--post-time text-sm"><i class="fi-rr-clock"></i>Closed at : {{ \Carbon\Carbon::parse($value->close_date)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-job-top--info">
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="card-job-top--type-job text-sm"><i class="fi-rr-briefcase" style="font-size:13px"> {{$value->sector}}</i></span>
                            <span class="card-job-top--type-job text-sm"><i class="fa fa-graduation-cap" style="font-size:13px"></i> {{$value->education}}</span>
                            <span class="card-job-top--type-job text-sm"><i class="fi-rr-clock"> </i>{{$value->name_experience_level}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-job-description mt-20">
                     <h6 class="card-job-top--info-heading"><a href="/detail-job/{{$value->id}}">Skill Requirement :</a></h6>
            </div>
            <div class="card-job-description mt-10">
                <a href="/detail-job/{{$value->id}}">
                    <h6 class="card-job-top--info-heading"><?php echo $value->skill_requirment; ?></h6>
                </a>

            </div>

        </div>
    @endforeach





