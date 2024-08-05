@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}

        .copy-button:hover {
            background-color: #45a049;
        }
        .popup {
            display: none; /* Initially hidden */
            position: absolute;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
            top: 485px !important; /* Position it directly below the button */
            left: 0; /* Align with the left edge of the button */
            width: max-content; /* Adjust width to fit content */
        }
        .popup.show {
            display: block;
        }
        .single-image-feature {
            max-width: 100%; /* Ensure container scales with screen size */
        }

        .w3-content {
            position: relative;
            max-width: 600px; /* Set a max-width for the container */
            margin: auto;
        }

        .w3-display-container {
            position: relative;
            width: 100%; /* Ensure container is responsive */
            height: 400px; /* Set a fixed height for the images */
            overflow: hidden;
        }

        .mySlides {
            width: 100%;
            height: 100%;
        }

        .mySlides img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the container */
        }
</style>
    <section class="section-box">
        <div class="box-head-single">
            <div class="container">
                <h3>{{$getdataDetail->traning_name}}</h3>
                <ul class="breadcrumbs">
                    <li><a href="#">Training</a></li>
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
                        <div class="w3-content w3-display-container">
                            @foreach ($listfiles as $valFile)
                                <div class="w3-display-container mySlides">
                                    <img  src="{{ asset('http://127.0.0.1:8081/storage/' . ($valFile->nama ?? '')) }}" style="width:100%" />
                                        
                                </div>
                            @endforeach
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
                        


                        <div class="text-start mt-20">
                            <input type="text" hidden id="textToCopy" value="http://127.0.0.1:8000/detail-course/{{base64_encode($getdataDetail->id)}}" readonly>
                            <a href="{{$getdataDetail->link_pendaftaran}}" class="btn btn-default mr-10">Apply now</a>
                            <a href="#" class="btn btn-default mr-10" onclick="copyToClipboard(event)">Share</a>
                            
                            <div id="popup" class="popup">
                                <p>Tautan telah disalin</p>
                            </div>
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
        function copyToClipboard(event) {
            event.preventDefault(); // Prevent default link behavior

            // Get the text field
            var copyText = document.getElementById("textToCopy").value;
            var popup = document.getElementById("popup");

            // Use the Clipboard API to copy text
            navigator.clipboard.writeText(copyText).then(function() {
                // Show the popup
                popup.classList.add("show");

                // Position the popup
                var button = event.target; // Get the clicked button
                var rect = button.getBoundingClientRect(); // Get button's position
                popup.style.top = (rect.bottom + window.scrollY) + 'px'; // Position below the button
                popup.style.left = (rect.left + window.scrollX) + 'px'; // Align with the button

                // Hide the popup after 3 seconds
                setTimeout(function() {
                    popup.classList.remove("show");
                }, 3000); // 3000 milliseconds = 3 seconds
            }).catch(function(error) {
                console.error('Gagal menyalin teks: ', error);
            });
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
