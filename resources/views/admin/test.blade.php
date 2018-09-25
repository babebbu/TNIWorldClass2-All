@extends('admin.layouts.template')

@section('title', 'Test')
@section('content')
    <button id="json">Get JSON data</button>

    <div id="json"></div>
@endsection

@section('page-script')
    <script>
        /*var msg = $.ajax({
                    type: "GET",
                    url: "https://tniworldclass.com/csrf",
                    async: false
                }).responseText();
        console.log($.parseJSON(msg)[0]);*/

         $.ajax({
            type: "GET",
            url: "https://tniworldclass.com/csrf",
            success: function(data){
                console.log(data);
            },
            async: false
        });
    </script>
@endsection