@extends('layouts.app')
@section('title')
@endsection
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
    <div class="breacrumb-cover">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="#">Latest News</a></li>
                <li>Details</li>
            </ul>
        </div>
    </div>
    <div class="archive-header pt-50 pb-50 text-center">
        <div class="container">
            <h3 class="mb-30 text-center w-75 mx-auto">
              {{$getdataDetail->title}}
            </h3>
            
        </div>
    </div>
    <div class="post-loop-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="single-body">
                        <div class="w3-content w3-display-container">
                            @foreach ($listfiles as $valFile)
                                <div class="w3-display-container mySlides">
                                    <figure class="mb-30">
                                        <img  src="{{ asset('http://127.0.0.1:8081/storage/' . ($valFile->nama ?? '')) }}" style="width:100%" />
                                    </figure>
                                </div>
                            @endforeach
    
                        </div>
                        
                        <div class="single-content">
                            <p><?php echo $getdataDetail->description; ?> </p>
                           
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
@endsection