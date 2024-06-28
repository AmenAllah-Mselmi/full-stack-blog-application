@extends('layouts.app')
@section('title') index @endsection
@section('content')
      <div class="mt-5">
        <div class="text-center">
            <a  class="btn btn-success" href="{{route('posts.create')}}"> Create Post</a>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->title}}</td>
            <td>{{$item->posted_by}}</td>
            <td>{{$item->created_at}}</td>
            <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a type="button" href="{{route("posts.show",$item->id)}}"    class="btn btn-danger">View</a>
                <a type="button"  href="{{route("posts.edit",$item->id)}}" class="btn btn-warning">Edit</a>
                <form  method="POST" action="{{route('posts.destroy',$item->id)}}">
                    @csrf
                    @method('DELETE');
                    <button type="submit" class="btn btn-success">Delete</button>
                </form>
              </div></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endsection
