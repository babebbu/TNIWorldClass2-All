@extends('admin.layouts.template')

@section('title', 'Test')
@section('content')
    <button id="json">Post JSON data</button>

    <div id="json"></div>
@endsection

@section('page-script')
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $.ajax({
                    type: 'POST',
                    url: 'https://tniworldclass.com/admin/registrants/callback-post',
                    data: 'hey fuck u',
                    success: function (json) {
                        console.log(json);
                        var msg = $.ajax({
                            type: "GET",
                            url: "https://tniworldclass.com/admin/registrants/callback",
                            async: false
                        }).responseText;
                        console.log($.parseJSON(msg)[0]);
                    },
                    dataType: 'json'
                });

            });
        });
    </script>
@endsection