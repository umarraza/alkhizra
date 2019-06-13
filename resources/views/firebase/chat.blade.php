<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{--  <script type="text/javascript" src="firebase.js"></script>  --}}
    {{--  <script src="https://www.gstatic.com/firebasejs/6.1.1/firebase.js"></script>  --}}
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

    <div class="row">
        <div class="col-lg-4">
        <div class="col-lg-4"></div>
            <div id="messageDiv">this is the div</div>
            <input id="nameInput" class="form-control form-control-sm" type="text" placeholder="Name">
            <input id="messageInput" class="form-control form-control-sm" type="text" placeholder="Message">
        </div>
        <div class="col-lg-4"></div>
    </div>

    {{--  <input id="nameInput" placeholder="Name"/>
    <input id="messageInput" placeholder="Message..."/>  --}}

    <script>

        var messageRef = new Firebase('https://alkhizra-76467.firebaseio.com/');
        $('#messageInput').keypress(function(e){

            if(e.keyCode == 13) {

                var name = $('#nameInput').val();
                var text = $('#messageInput').val();
                messageRef.push({name:name, text:text});

                $('#messageInput').val();
            }

        }); 

        messageRef.on('child_added',function(snapshot){
            
            var message = snapshot.val();
            document.getElementById('messageDiv').innerHTML += message.name+':        '+message.text+'<br/>';

        });

    </script>
</body>
</html>