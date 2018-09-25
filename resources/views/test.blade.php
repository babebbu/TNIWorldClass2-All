<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

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

WTF!