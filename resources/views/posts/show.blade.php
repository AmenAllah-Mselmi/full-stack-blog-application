@extends('layouts.app')
@section('title')
show
@endsection
@section('content')

<div class="card">
        <div class="card-header">
          Post Info
        </div>
        <div class="card-body">
          <h5 class="card-title">Title:{{$singlepost1->title}}</h5>
          <p class="card-text">Description:{{$singlepost1->description}}</p>

        </div>
      </div>
      <div class="card">
        <div class="card-header">
          Post Creator Info
        </div>
        <div class="card-body">
          <h5 class="card-title">Email:{{$singlepost1->posted_by}}</h5>
          <p class="card-text">{{$singlepost1->created_at}}</p>

        </div>
      </div>
@endsection
