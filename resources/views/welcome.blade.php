@extends('layouts.app')
@section('title')
    HOME
@endsection

@section('content')

<section class="section-box">
    <div class="banner-hero hero-1">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-8">
                    <div class="block-banner">
                        <span class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">Best training,jobs place and News</span>
                        <h1 class="heading-banner wow animate__animated animate__fadeInUp"> The easiest way to get</h1>
                        <h1 class="heading-banner wow animate__animated animate__fadeInUp"> training, new jobs and the latest information for you</h1>
                       
                        <div class="banner-description mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Each month, more than 3 million job seekers turn to website in their search for work, making over 140,000 applications every single day</div>
                        
                        <div class="list-tags-banner mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <strong>Popular Searches:</strong>
                            <a href="#">Designer</a>, <a href="#">Developer</a>, <a href="#">Web</a>, <a href="#">Engineer</a>, <a href="#">Senior</a>,
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-imgs">
                        <img alt="jobhub" src="assets/imgs/banner/banner.png" class="img-responsive shape-1" />
                        <span class="union-icon"><img alt="jobhub" src="assets/imgs/banner/union.svg" class="img-responsive shape-3" /></span>
                        <span class="congratulation-icon"><img alt="jobhub" src="assets/imgs/banner/congratulation.svg" class="img-responsive shape-2" /></span>
                        <span class="docs-icon"><img alt="jobhub" src="assets/imgs/banner/docs.svg" class="img-responsive shape-2" /></span>
                        <span class="course-icon"><img alt="jobhub" src="assets/imgs/banner/course.svg" class="img-responsive shape-3" /></span>
                        <span class="web-dev-icon"><img alt="jobhub" src="assets/imgs/banner/web-dev.svg" class="img-responsive shape-3" /></span>
                        <span class="tick-icon"><img alt="jobhub" src="assets/imgs/banner/tick.svg" class="img-responsive shape-3" /></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section-box wow animate__animated animate__fadeIn mt-70">
    <div class="container">
        <div class="box-swiper">
            <div class="swiper-container swiper-group-6">
                <div class="swiper-wrapper pb-70 pt-5">
                    <div class="swiper-slide hover-up">
                        <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="assets/imgs/slider/logo/google.svg" /></a></div>
                    </div>
                    <div class="swiper-slide hover-up">
                        <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="assets/imgs/slider/logo/airbnb.svg" /></a></div>
                    </div>
                    <div class="swiper-slide hover-up">
                        <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="assets/imgs/slider/logo/dropbox.svg" /></a></div>
                    </div>
                    <div class="swiper-slide hover-up">
                        <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="assets/imgs/slider/logo/fedex.svg" /></a></div>
                    </div>
                    <div class="swiper-slide hover-up">
                        <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="assets/imgs/slider/logo/wallmart.svg" /></a></div>
                    </div>
                    <div class="swiper-slide hover-up">
                        <div class="item-logo"><a href="candidates-single.html"><img alt="jobhub" src="assets/imgs/slider/logo/hubspot.svg" /></a></div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

@endsection