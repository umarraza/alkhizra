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
    <h1>Student Details</h1>
    <p>Name: <b>{{$username}}</b></p>
    <p>Email: <b>{{$email}}</b></p>

    <div class="container">
        <div class="col-lg-12" style="text-align: center; margin-top:20px;">
            <img src="https://www.zamzar.com/images/filetypes/jpg.png" alt="Smiley face" id="image64" style="width: -webkit-fill-available;
    height: -webkit-fill-available;">
        </div>
    </div>
    <input id="classId" class="form-control form-control-sm" type="hidden" value="{{$class_id}}">

    <script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-database.js"></script>
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    <script>
        //var messageRef = new Firebase('https://umarraza-c491c.firebaseio.com/');
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBbgkmXS7P8ExVMsKi9zLt3_rlo6kR1jyk",
            authDomain: "umarraza-c491c.firebaseapp.com",
            databaseURL: "https://umarraza-c491c.firebaseio.com",
            projectId: "umarraza-c491c",
            storageBucket: "umarraza-c491c.appspot.com",
            messagingSenderId: "943661641353",
            appId: "1:943661641353:web:e7a08b1ce1b52a03"
        };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);

            // var messageRef = new Firebase('https://umarraza-c491c.firebaseio.com/');
            var database = firebase.database();
            var messageRef = firebase.database().ref();
            var classId = document.getElementById('classId').value;
                var messageRef = firebase.database().ref('class/' + classId);
                messageRef.on('value', function(snapshot) {
                var message = snapshot.val();
                if (message.classId == classId) {
                    var src = message.image;
                    var image = document.getElementById('image64');
                    image['src'] = src;
                }
            });

    /*
     messageRef.on('child_added',function(snapshot){

            var message = snapshot.val();
            var classId = document.getElementById('classId').value;
            
            if (message.classId == classId) {
                var src = message.image64;
                var image = document.getElementById('image64');
                image['src'] = src;
            }
          }); 
*/

</script>
</body>
</html>