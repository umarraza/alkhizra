@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4">
        <div id="messageDiv"></div> <br>
        
        <input type="hidden" id="userId" value="{{Auth::User()->id}}">
        <input type="hidden" id="nameInput" class="form-control form-control-sm" type="text" placeholder="Name" value="{{Auth::User()->name}}">

        <p>{{Auth::User()->name}}</p>
        <input id="messageInput" class="form-control form-control-sm" type="text" placeholder="Message">
    </div>
    <div class="col-lg-4 col-md-4"></div>
</div>

<script>

    var messageRef = new Firebase('https://alkhizra-76467.firebaseio.com/');

    $('#messageInput').keypress(function(e){

        if(e.keyCode == 13) {

            var name = $('#nameInput').val();
            var text = $('#messageInput').val();
            var userId = $('#userId').val();

            messageRef.push({name:name, text:text, userId:userId});

            $('#messageInput').val();
        }

    }); 

    messageRef.on('child_added',function(snapshot){
        
        var message = snapshot.val();
        document.getElementById('messageDiv').innerHTML += message.name+': '+message.text+'<br/>';

    });

</script>

@endsection