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
</div>
<script>

    var messageRef = new Firebase('https://alkhizra-76467.firebaseio.com/');

    function show(message) {

        var para = document.querySelector('.para');
        console.log(para);


    }

    $('#messageInput').keypress(function(e){

        if(e.keyCode == 13) {



            var name      =  $('#nameInput').val();
            var text      =  $('#messageInput').val();
            var userId    =  $('#userId').val();
            var classId   =  $('#classId').val();
            var roleId    =  $('#roleId').val();

            var today     =  new Date();
            var date      =  today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var time      =  today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime  =  date+' '+time;

            messageRef.push({
                
                name:name, 
                text:text, 
                userId:userId, 
                classId:classId, 
                roleId:roleId, 
                time:time });

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
                var para = document.createElement('p');                

                element.className = `teacher-message`;
                para.className = `pull-right`;


                element.style.cssText = "width:400px;height:auto; background:#E5E8E8;margin:5px 0 5px 0;border-radius: 25px 20px 15px 3px;padding:13px 0 10px 10px;color:#000"
                para.style.cssText = "display:inline-block;color:#566573; padding:0 13px 0 0;text-size:50px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;";



                element.appendChild(document.createTextNode(message.text));
                element.appendChild(para);
                para.appendChild(document.createTextNode(message.time));

                const target = document.querySelector('.show-message');  

                var parent = target.parentNode;

                parent.insertBefore(element, target);

            } else if(message.roleId == 3) {

                var element2 = document.createElement('div');
                var para2 = document.createElement('p');                

                element2.className = `student-message `;
                para2.className = `pull-right`;


                element2.style.cssText = "width:400px;height:auto; background:#0768C3;margin:5px 0 5px 200px;border-radius: 20px 25px 3px 15px;padding:13px 0 10px 10px;color:#fff;"
                para2.style.cssText = "display:inline-block;color:#EBEDEF; padding:0 13px 0 0;text-size:50px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;";

                element2.appendChild(document.createTextNode(message.text));
                element2.appendChild(para2);
                para2.appendChild(document.createTextNode(message.time));


                const target = document.querySelector('.show-message');  

                var parent = target.parentNode;

                parent.insertBefore(element2, target);

            }
        }
    });

</script>

@endsection