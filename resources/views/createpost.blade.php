@extends('Layout.master')
@section('createpost')
<!DOCTYPE html>
<html lang="en">

<body>
    <div style="border: 3px solid black;">
        <h1>Create A New Post</h1>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title"placeholder="Post Title">
            <textarea name="body" placeholder="Content..."></textarea>
            <button>Submit</button>
        </form>
    </div>
</body>

@endsection
