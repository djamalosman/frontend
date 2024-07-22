@extends('layouts.app')
@section('title')
    HOME
@endsection

@section('content')
<div class="breacrumb-cover">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="#">{{$title_parent}}</a></li>
            <li>{{$title_child}}</li>
        </ul>
    </div>
</div>
<div class="archive-header pt-50 pb-50 text-center">
    <div class="container">
        <h3 class="mb-30 text-center w-75 mx-auto">
			<h4 class="mt-2 mb-0 display-5">{{$dataItem->side_list}}</h4>
        </h3>
        
    </div>
</div>
<div class="post-loop-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="single-body">
                    <figure class="mb-30">
                        <img src="https://admin.trainingkerja.com/public/storage/{{ $dataItem->file ?? '' }}" class="card-img-top" alt="course image" width="140px">
                    </figure>
                    <div class="single-content">
						<?php echo $dataItem->item_body ?>
                    </div>
                    

                    <div class="related-posts mt-50">
                        <h4 class="mb-30">Training / Course</h4>
                        <div class="box-swiper">
                            <div class="swiper-container swiper-group-3">
                                <div class="swiper-wrapper pb-30 pt-5">
                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up p-15">
                                            <a href="blog-single.html">
                                                <figure><img alt="jobhub" src="assets/imgs/blog/img-blog-1.png" /></figure>
                                            </a>
                                            <h6 class="heading-md mt-15 mb-0"><a href="blog-single.html">Senior Full Stack, Creator Success Full Time</a></h6>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up p-15">
                                            <a href="blog-single.html">
                                                <figure><img alt="jobhub" src="assets/imgs/blog/img-blog-2.png" /></figure>
                                            </a>
                                            <h6 class="heading-md mt-15 mb-0"><a href="blog-single.html">21 Job Tips: Make a Great Impression For You</a></h6>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up p-15">
                                            <a href="blog-single.html">
                                                <figure><img alt="jobhub" src="assets/imgs/blog/img-blog-3.png" /></figure>
                                            </a>
                                            <h6 class="heading-md mt-15 mb-0"><a href="blog-single.html">How To Break Up Your Day In Morning</a></h6>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card-grid-3 hover-up p-15">
                                            <a href="blog-single.html">
                                                <figure><img alt="jobhub" src="assets/imgs/blog/img-blog-4.png" /></figure>
                                            </a>
                                            <h6 class="heading-md mt-15 mb-0"><a href="blog-single.html">How To Create a Resume for a Job In France</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination swiper-pagination3"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<section class="section-box mt-50 mb-60">
    <div class="container">
        <div class="box-newsletter">
            <h5 class="text-md-newsletter">Sign up to get</h5>
            <h6 class="text-lg-newsletter">the latest jobs</h6>
            <div class="box-form-newsletter mt-30">
                <form class="form-newsletter">
                    <input type="text" class="input-newsletter" value="" placeholder="contact.alithemes@gmail.com" />
                    <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="box-newsletter-bottom">
            <div class="newsletter-bottom"></div>
        </div>
    </div>
</section>
@endsection