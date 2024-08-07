<style>
    .post-title {

        font-weight: bold;

        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 2.8;
        /* Adjust this value if necessary */
        height: 2em;
    }
</style>
@foreach($data as $value)
    <div class="col-lg-4 col-md-6">
        <div class="card-grid-2 hover-up">
            <div class="text-center card-grid-2-image">
                <a href="/detail-course/{{$value->id}}">
                    <div class="imgGrid-container">

                        <figure>
                            {{-- <img  src="assets/imgs/jobs/job-1.png" alt="jobhub" /> --}}
                            <a href="/detail-course/{{base64_encode($value->id)}}">
                                <img class="imgGrid" src="{{ asset('http://127.0.0.1:8081/storage/' . ($value->image_path ?? '')) }}" />
                            </a>
                        </figure>
                    </div>
                </a>
            </div>
            <div class="card-block-info">
                <a href="/detail-course/{{base64_encode($value->id)}}"><h5 class=" post-title  mt-20"><b>{{$value->traning_name}}</b></h5></a>
                <div class="mt-15">
                    <h6 class="mt-20"  style="font-size: 14px;">{{$value->category}}</h6>
                    <div class="row">
                        <div class="col-lg-12  mt-15">
                            <span class="fa fa-graduation-cap"></span> {{$value->cetificate_type}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="card-location"> {{$value->nama_provinsi}},{{$value->lokasi}}</span>
                        </div>
                        <div class="col-lg-7  mt-15">

                        </div>
                    </div>
                </div>
                <div class="mt-15">
                    <span class="card-time">  {{ \Carbon\Carbon::parse($value->startdate)->format('d M Y') }}</span>
                </div>
                {{-- <div class="row">

                    <div class="col-lg-4  mt-15">
                            <i class="fa fa-graduation-cap" style="font-size:15px"></i>  <span>{{$value->cetificate_type}}</span>

                    </div>
                    <div class="col-lg-6 mt-15">
                        <span class="card-location"> {{$value->nama_provinsi}},{{$value->lokasi}}</span>
                    </div>
                </div> --}}

                <div class="card-2-bottom mt-10">
                    <div class="row">
                        <div class="col-lg-12 col-8">

                        </div>
                    </div>
                </div>
                <div class="card-2-bottom mt-30">
                    <div class="row">
                        <div class="col-lg-3 col-4">
                            <a href="/detail-course/{{base64_encode($value->id)}}"> <span>{{$value->namaonlineofline}}</span></a>
                        </div>
                        <div class="col-lg-9 col-8 text-end">
                            <span class="card-text-price"> {{$value->registrationfee}}</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
