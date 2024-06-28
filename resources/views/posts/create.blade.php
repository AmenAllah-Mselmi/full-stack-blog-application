@extends('layouts.app')
@section('title')
create
@endsection
@section('content')
<form method="POST" action="{{ route("posts.store") }}" class="container">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter title">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlSelect1" class="form-label">Author</label>
        <select class="form-select" name="postcreator" aria-label="Default select example">
            <option  selected>Select Author</option>
            @foreach ($users as $item)
            <option value={{$item->name}} >{{$item->name}}</option>

            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
