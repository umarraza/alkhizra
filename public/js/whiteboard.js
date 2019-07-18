window.addEventListener('load', () => {

    var layout_expand_south = document.getElementsByClassName('layout-expand-south');
    layout_expand_south[0].setAttribute("id", "layout_expand_south");
    
    var remove_pannel_south = document.getElementById("layout_expand_south");
    remove_pannel_south.remove();

    var layout = document.getElementsByClassName('layout-expand-east');
    layout[0].setAttribute("id", "remove_pannel_body");

    var remove_pannel_body = document.getElementById("remove_pannel_body");
    remove_pannel_body.remove();

});

var messageRef = new Firebase('https://whiteboard-fb2e1.firebaseio.com/');

setInterval(function(){
       
    var canvasContainer = document.getElementsByClassName('canvas-container');
    canvasContainer[0].setAttribute("id", "myCanvas");
       
    var c = document.getElementById("canvasBoard");
    var image64 = c.toDataURL();

    var classId  =  document.getElementById('classId').value;
    var name     =  document.getElementById('nameInput').value;
    var userId   =  document.getElementById('userId').value;
    var roleId   =  document.getElementById('roleId').value;

    messageRef.push({
       image64:image64,
       classId:classId,
       name:name,
       userId:userId,
       roleId:roleId
    });
       
    messageRef.on('child_added',function(snapshot){
       var message = snapshot.val();
       console.log(classId);
    }); 
  }, 200);
