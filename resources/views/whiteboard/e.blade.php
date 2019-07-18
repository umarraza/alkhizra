<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>White Board</title>

    <link href="{{ asset('/public/css/screen.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="{{ asset('/public/js/screen.js') }}"></script>
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    {{-- <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script> --}}

</head>
<body>
    <div class="container">
        {{-- <div class="row"> --}}
            {{-- <div class="col-lg-4"></div> --}}
                <div class="col-lg-12" style="text-align: center; margin-top:20px;">
                    <img src="https://www.zamzar.com/images/filetypes/jpg.png" alt="Smiley face" height="700" width="700" id="image64">
                </div>
            {{-- <div class="col-lg-4"></div> --}}
        {{-- </div> --}}
    </div>

    <script>
        var messageRef = new Firebase('https://whiteboard-fb2e1.firebaseio.com/');

        messageRef.on('child_added',function(snapshot){
        
            var message = snapshot.val();
            var src = message.image64;
            var image = document.getElementById('image64');
        
            image['src'] = src;
          }); 

</script>
</body>
</html>