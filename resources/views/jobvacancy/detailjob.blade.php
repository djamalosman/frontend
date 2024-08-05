@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')
<style>
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
            top: 505px !important; /* Position it directly below the button */
            left: 0; /* Align with the left edge of the button */
            width: max-content; /* Adjust width to fit content */
        }
        .popup.show {
            display: block;
        }
</style>
    <section class="section-box">
        <div class="box-head-single">
            <div class="container">
                <h3>{{$getdataDetail->job_title}}</h3>
                <ul class="breadcrumbs">
                    <li><a href="#">Jobs</a></li>
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
                                <h5><span class="sidebar-company">{{$getdataDetail->companyName}}</span></h5>
                            </div>
                        </div>


                        <div class="text-start mt-20">
                            <input type="text" hidden id="textToCopy" value="http://127.0.0.1:8000/detail-job/{{base64_encode($getdataDetail->id)}}" readonly>
                            <a href="{{$getdataDetail->linkpendaftaran}}" class="btn btn-default mr-10">Apply now</a>
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
                                        <span class="text-description">Placement</span>
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
                                    <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description">Location</span>
                                        <strong class="small-heading">{{$getdataDetail->provinsi}} - {{$getdataDetail->lokasi}}</strong>
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
    <script>
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
@endsection
