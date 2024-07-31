@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
    <section class="section-box">
        <div class="box-head-single">
            <div class="container">
                <h3>{{$getdataDetail->traning_name}}</h3>
                <ul class="breadcrumbs">
                    <li><a href="#">Browse Training By Category</a></li>
                    <li>Detail Training</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="single-image-feature">
                       
                        
                        <div class="w3-content w3-display-container">
                            @foreach ($listfiles as $valFile)
                                <div class="w3-display-container mySlides">
                                    <img  src="{{ asset('http://127.0.0.1:8081/storage/' . ($valFile->nama ?? '')) }}" style="width:100%" />
                                
                                </div>
                            @endforeach
                           
                            {{-- <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button> --}}
                            
                        </div>
                    </div>
                    <div class="content-single">
                        <h5>Training requirements</h5>
                        <ul>
                            @foreach($listpersyaratan as $persyaratan)
                                <li>  {{$persyaratan->nama}} </li>
                            @endforeach
                        </ul>
                        <h5>Training material</h5>
                        <ul>
                            @foreach($listmateri as $materi)
                                <li>  {{$materi->nama}} </li>
                            @endforeach
                        </ul>
                        <h5>Facility</h5>
                        <ul>
                            @foreach($listfasilitas as $fasilitas)
                                <li>  {{$fasilitas->nama}} </li>
                            @endforeach
                        </ul>
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
                            <a href="{{$getdataDetail->link_pendaftaran}}" class="btn btn-default mr-10">Apply now</a>
                            <a href="#" class="btn btn-default mr-10">Share</a>
                        </div>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"> <i class="fi-rr-edit mr-5 text-grey-6"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Category</span>
                                        <strong class="small-heading">{{$getdataDetail->category}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-edit mr-5 text-grey-6"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Certificate type</span>
                                        <strong class="small-heading">{{$getdataDetail->cetificate_type}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Durasi Training</span>
                                        <strong class="small-heading">{{ $getdataDetail->training_duration}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Registration fee</span>
                                        <strong class="small-heading">{{$getdataDetail->registrationfee}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-edit mr-5 text-grey-6"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Type Training</span>
                                        <strong class="small-heading">{{$getdataDetail->typeonlineofline}}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Location</span>
                                        <strong class="small-heading">{{$getdataDetail->provinsi}} - {{$getdataDetail->lokasi}} </strong>
                                    </div>
                                </li>


                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Training start date</span>
                                        <strong class="small-heading">{{ \Carbon\Carbon::parse($getdataDetail->startdate)->format('d M Y') }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Training end date</span>
                                        <strong class="small-heading">{{ \Carbon\Carbon::parse($getdataDetail->enddate)->format('d M Y') }}</strong>
                                    </div>
                                </li>


                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
   

    <script>
        var myIndex = 0;
        carousel();
        
        function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>
    {{-- <script>
        var slideIndex = 1;
        showDivs(slideIndex);
        
        function plusDivs(n) {
          showDivs(slideIndex += n);
        }
        
        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }
    </script> --}}
        
        
@endsection
