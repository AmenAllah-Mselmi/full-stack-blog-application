@extends('layouts.app');
@section('title')
update
@endsection
@section('content')
<form  class="container" action="{{route('posts.update',$posts->id)}}" method="POST">
    @csrf
    @method('PUT');
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title" value="{{$posts->title}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description" >{{$posts->description}}</textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlSelect1" class="form-label">Author</label>
        <select class="form-select" name="postcreator" aria-label="Default select example">
            @foreach ($users as $item)
            <option value={{$item->name}}>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
