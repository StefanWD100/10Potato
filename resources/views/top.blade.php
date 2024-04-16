<!DOCTYPE html>
<html>
<head>
  <title>Top bangers</title>
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
@extends('layouts.app')

@section('content')

<div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Points</th>
    </tr>
  </thead>
 
  <tbody>
  @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{$user -> name}}</td>
      <td>{{$user -> points}}</td>
    </tr>
    @endforeach
  </tbody>
  
</table>
</div>

@endsection
</body>
</html>