@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4">

        <div id="messageDiv1" class="pull-left"></div> <br>
        <div id="messageDiv2" class="pull-right"></div> <br>
        
        <input type="hidden" id="userId" value="{{Auth::User()->id}}">
        <input type="hidden" id="nameInput" class="form-control form-control-sm" type="text" value="{{Auth::User()->name}}">
        <input type="hidden" id="roleId" class="form-control form-control-sm" type="text" value="{{Auth::User()->roleId}}">

        <input type="hidden" id="classId" class="form-control form-control-sm" type="text" value="{{$class_id}}">

        <input id="messageInput" class="form-control form-control-sm" type="text" placeholder="Message">
        <br>
        <p><b>{{Auth::User()->name}}</b></p>

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
            var classId = $('#classId').val();

            var roleId = $('#roleId').val();

            messageRef.push({name:name, text:text, userId:userId, classId:classId, roleId:roleId});
            document.querySelector('#messageInput').value = '';

            $('#messageInput').val();
        }
    }); 

    messageRef.on('child_added',function(snapshot){
        
        var message = snapshot.val();
        var class_id = $('#classId').val();

        if (message.classId == class_id) {

            if (message.roleId == 2) {

                document.getElementById('messageDiv1').innerHTML += message.name+': '+message.text+'<br/>';

            } else if(message.roleId == 3) {

                document.getElementById('messageDiv2').innerHTML += message.name+': '+message.text+'<br/>';

            }
        }
    });

</script>

@endsection