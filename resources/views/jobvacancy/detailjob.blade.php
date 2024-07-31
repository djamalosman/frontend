@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

    <section class="section-box">
        <div class="box-head-single">
            <div class="container">
                <h3>{{$getdataDetail->job_title}}</h3>
                <ul class="breadcrumbs">
                    <li><a href="#">Browse Jobs</a></li>
                    <li>{{$title}}</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="single-image-feature">
                        <figure><img alt="jobhub" src="{{ asset('assets/imgs/page/job-single/img-job-feature.png')}}" class="img-rd-15" />
                        </figure>
                    </div>
                    <div class="content-single">
                        <h5>Jobs description :</h5>
                        <p>
                            <?php echo $getdataDetail->job_description; ?>
                        </p>

                        <h5>Skill requirement :</h5>
                        <?php echo $getdataDetail->skill_requirment; ?>

                    </div>
                    <div class="single-apply-jobs">
                        <div class="row align-items-center">

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-shadow">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <figure><img alt="jobhub" src="{{ asset('assets/imgs/page/job-single/avatar-job.png')}}" /></figure>
                                <div class="sidebar-info">
                                    <span class="sidebar-company">AliStudio, Inc</span>
                                    <span class="sidebar-website-text">alithemes.com</span>

                                </div>
                            </div>
                        </div>


                        <div class="text-start mt-20">
                            <a href="#" class="btn btn-default mr-10">Share</a>
                            <a href="{{$getdataDetail->linkpendaftaran}}" class="btn btn-default mr-10">Apply</a>
                        </div>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"> <i class="fi-rr-edit mr-5 text-grey-6"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Education</span>
                                        <strong class="small-heading">{{$getdataDetail->education}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Job Type</span>
                                        <strong class="small-heading">{{$getdataDetail->job_type}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Location</span>
                                        <strong class="small-heading">{{$getdataDetail->work_location}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Sector</span>
                                        <strong class="small-heading">{{$getdataDetail->sector}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Salary</span>
                                        <strong class="small-heading">{{$getdataDetail->salary}} -  {{$getdataDetail->fee}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Experience Level</span>
                                        <strong class="small-heading">{{$getdataDetail->name_experience_level}} Years</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Posted at</span>
                                        <strong class="small-heading">{{ \Carbon\Carbon::parse($getdataDetail->posted_date)->format('d M Y') }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Closed at</span>
                                        <strong class="small-heading">{{ \Carbon\Carbon::parse($getdataDetail->close_date)->format('d M Y') }}</strong>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
