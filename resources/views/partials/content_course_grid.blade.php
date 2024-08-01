@foreach ($data as $value)
    <div class="col-lg-4 col-md-6">
        <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".0s">
            <div class="text-center card-grid-2-image">
                <div class="w3-content w3-display-container imgGrid-container">
                    @php
                        // Menyaring file yang sesuai dengan $value->id
                        $filteredFiles = $listfiles->filter(function ($valFile) use ($value) {
                            return $valFile->id_training_course_dtl == $value->id;
                        });
                    @endphp

                    @forelse ($filteredFiles as $valFile)
                        <div class="w3-display-container mySlides imgGrid">
                            <img src="{{ asset('http://127.0.0.1:8081/storage/' . ($valFile->nama ?? '')) }}" style="width:100%" />
                        </div>
                    @empty
                        <div class="imgGrid-container">
                            <img class="imgGrid" src="assets/imgs/jobs/job-1.png" />
                        </div>
                    @endforelse

                </div>
                <label class="btn-urgent"> {{$value->typeonlineofline}}</label>
            </div>
            <div class="card-block-info">
                <div class="mt-15">
                    <a href="/detail-course/{{$value->id}}">
                        <span>{{$value->traning_name}}</span>
                    </a>
                </div>
                <div class="mt-15">
                    <span class="card-time">Posted at : {{ \Carbon\Carbon::parse($value->startdate)->format('d M Y') }}</span>
                    <span class="card-time">Closed at : {{ \Carbon\Carbon::parse($value->enddate)->format('d M Y') }}</span>
                </div>
                <div class="card-2-bottom mt-30">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <span class="card-text-price"> {{$value->registrationfee}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.querySelectorAll(".mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>
