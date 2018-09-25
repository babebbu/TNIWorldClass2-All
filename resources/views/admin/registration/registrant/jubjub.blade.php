@extends('admin.layouts.template')

@section('title', "Registrant Profile")
@section('content')

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

    @foreach($registrants as $registrant)
        <a href="{{ URL::to("/admin/registrants/$registrant->id") }}"><img class="profilepic" src="{{ URL::to("/admin/registrants/profilepic/$registrant->profile_picture") }}" style="width: 24.5%; margin-bottom: 30px;"></a>
    @endforeach

@endsection