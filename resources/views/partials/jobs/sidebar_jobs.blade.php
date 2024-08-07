@foreach($trainings as $training)
    <div class="post-list-small-item d-flex align-items-center">
        <figure class="thumb mr-15">
            <a href="/detail-course/{{$training->id}}">
                <img src="{{ asset('assets/imgs/blog/thumb-1.png')}}" alt="">
            </a>
        </figure>
        <div class="content">
            <a href="/detail-course/{{$training->id}}"><h5 style="font-size: 17px;">{{$training->traning_name}}</h5></a>

            <div class="post-meta text-muted d-flex align-items-center mb-15">
                <div class="author d-flex align-items-center mr-20">
                    <span><h5 style="font-size: 13px">{{$training->category}}</h5></span>
                </div>
                <div class="date">
                    <span><h5 style="font-size: 13px"> {{$training->registrationfee}}</h5> </span>
                </div>
            </div>

        </div>
    </div>
@endforeach
