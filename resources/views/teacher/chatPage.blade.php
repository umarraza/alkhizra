@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4 parent">

        <div class="show-message"></div>

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

                var element = document.createElement('div');

                element.className = `teacher-message`;
                element.style.cssText = "width:400px;height:auto; background:#E5E8E8;margin:5px 0 5px 0;border-radius: 25px 20px 15px 3px;padding:13px 0 10px 10px;color:#000"

                element.appendChild(document.createTextNode(message.name+': '+message.text));

                const target = document.querySelector('.show-message');  

                var parent = target.parentNode;

                parent.insertBefore(element, target);

            } else if(message.roleId == 3) {

                var element2 = document.createElement('div');
                element2.className = `student-message `;

                element2.style.cssText = "width:400px;height:auto; background:#0768C3;margin:5px 0 5px 200px;border-radius: 20px 25px 3px 15px;padding:13px 0 10px 10px;color:#fff;"

                element2.appendChild(document.createTextNode(message.name+': '+message.text));

                const target = document.querySelector('.show-message');  

                var parent = target.parentNode;

                parent.insertBefore(element2, target);

            }
        }
    });

</script>

@endsection