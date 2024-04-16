@extends('layouts.app')

@section('content')


<div class="container mt-5">
 
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
  <div class="card">
 
    <div class="card-header text-center font-weight-bold">
      <h2>Ovde ga namazi</h2>
    </div>
 
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ url('save') }}" >
        @csrf     
            <div class="row">
 
                <div class="col-md-12">
                    <div class="form-group">
                        <input name="userid" type="hidden"  value ="{{Auth::user()->id}}">
                        <input name="user" type="hidden"  value ="{{Auth::user()->name}}">
                        <input name="name" type="text" class="form-control"  placeholder="Unesi naslov" maxlength = "50">
                        <input type="file" name="image" placeholder="Choose image" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
 
    </div>
 
  </div>
 
</div> 
@endsection
