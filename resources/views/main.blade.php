@extends('layouts.app')

@section('content')


          @foreach ($photos as $num)
          <form action="{{ url('like') }}" enctype="multipart/form-data" method="POST" class="col-lg-6 offset-lg-3 ">
          @csrf
            
                <h2>{{$num -> name}}</h2>
                <a>By:{{$num -> user}}</a></br>
                <img src="{{asset('storage/images/'.$num -> filename)}}" alt="{{$num -> path}}"></br>
                <a>Poeni:{{$num -> points}}</a></br>
                <input type="hidden" name="id" value ="{{$num -> id}}">
                <input type="hidden" name="postpoints" value ="{{$num -> points}}">
                <input type="hidden" name="posterid" value ="{{$num -> userid}}">
            
         
            <button type="submit" name="action" value="Like">Like</button>
            <button type="submit" name="action" value="Dislike">Dislike</button>
          </form></br></br>
          @endforeach
        
        


@endsection
