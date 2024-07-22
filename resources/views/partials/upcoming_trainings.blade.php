@foreach($trainings as $training)
    <div class="post-list-small-item d-flex align-items-center">
        <figure class="thumb mr-15">
            <a href="/detail-course/{{$training->id}}">
            <img src="{{ asset('assets/imgs/blog/thumb-1.png')}}" alt="">
            </a>
        </figure>
        <div class="content">
            <a href="/detail-course/{{$training->id}}"><h5>{{$training->traning_name}}</h5></a>
            <div class="post-meta text-muted d-flex align-items-center mb-15">
                <div class="author d-flex align-items-center mr-20">
                    <a href="/detail-course/{{$training->id}}"><span><h6>{{$training->category}}</h6></span></a>
                </div>
                <div class="date">
                    <span class="card-text-price" ><a href="/detail-course/{{$training->id}}"><b style="color: #0a53be"> {{$training->registrationfee}}</b> </a></span>
                </div>
            </div>

        </div>
    </div>
@endforeach
