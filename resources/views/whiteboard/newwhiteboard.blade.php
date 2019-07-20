
<!DOCTYPE html>  
<html>  
<head>  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Free Online Whiteboard</title>
<meta name="Description" content="Free Online Whiteboard and Collaboration - A Free web whiteboard loaded with great functionalities like online presentation, setup customize background, different pen sizes, millions of colors, adding text with beautiful fonts, simple Do and Undo functions, eraser, add various shapes, add customize images and finally save your work as an image or whiteboard itself which can be uploaded later iwhen and as needed. This is ideal for teaching online or presentation online." />
<meta name="Keywords" content="Free, Online, Whiteboard, Teaching, Students, Presentation., Background, Fonts, text, Eraser, Pencil, Shapes"/>
<base href="https://www.tutorialspoint.com/" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="theme/css/gray/easyui.css">
<link rel="stylesheet" type="text/css" href="theme/css/icon.css">
<link rel="stylesheet" type="text/css" href="theme/css/lightslider.css">
<link rel="stylesheet" type="text/css" href="theme/css/whiteboard.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One|Lobster|Shadows+Into+Light|Pacifico|Sigmar+One|Courgette|Lobster+Two|Pinyon+Script|Playball|Satisfy|Great+Vibes|Tangerine|Luckiest+Guy' rel='stylesheet' type='text/css'>
<script src="theme/js/jquery.js"></script> 
<script src="theme/js/jquery.easyui.min.js"></script>
<script src="theme/js/fabric-min.js"></script>
<script src="theme/js/screenfull.js"></script>
<script src="theme/js/ion.sound.min.js"></script>
<script src="theme/js/rmc3.min.js"></script>
<script src="theme/js/rmc3.fbr.min.js"></script>
<script src="theme/js/socket.io.js"></script>
<link rel="stylesheet" type="text/css" href="theme/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="theme/css/slick-theme.css"/>
<script type="text/javascript" src="theme/js/slick.min.js"></script>
<script type="text/javascript" src="tutor_connect/js/bootstrap.min.js"></script>



<style>
.fa-refresh:before {content:"\f079"; font-family:'FontAwesome'; font-size:150%; font-style:normal;}
#refresh{display:none;}
</style>

<script type="text/javascript">
$(document).ready(function() { 
   var tc_flodername = '';
   var tc_slides = '';
   var id = '#dialog';
   //Get the screen height and width
   var maskHeight = $(document).height();
   var maskWidth = $(window).width();
   //Set heigth and width to mask to fill up the whole screen
   $('#mask').css({'width':maskWidth,'height':maskHeight});
   //transition effect
   $('#mask').fadeIn(500);
   $('#mask').fadeTo("slow",0.5); 
   //Get the window height and width
   var winH = $(window).height();
   var winW = $(window).width();
   //Set the popup window to center
   $(id).css('top',  winH/2-$(id).height()/2);
   $(id).css('left', winW/2-$(id).width()/2);
   //transition effect
   if(tc_flodername != '' && tc_slides !=''){
      //$(id).fadeIn(2000);  
      $('#mask').hide();      
   } else {
      $(id).fadeIn(2000);    
   }
   
   //if close button is clicked
   $('.window .close').click(function (e) {
   //Cancel the link behavior
   e.preventDefault();
   $('#mask').hide();
   $('.window').hide();
   });
   //if mask is clicked
   $('#mask').click(function () {
   $(this).hide();
   $('.window').hide();
   });
   $('.carousel').carousel({
     interval: 1000 * 7
   });
   $('.carousel').carousel('cycle');
});
</script>
</head> 
<body class="easyui-layout" id="cc">

<!-- Loader html code -->
<div class="wrapLoader">
   <div class="imgLoader">
      <img src="/images/loading.gif" alt="" width="70" height="70" />
      <div id="wait"></div>
   </div>
</div>
<!-- end of Loader html code -->

<!-- popup html code -->
{{-- <div id="boxes">         
   <div id="dialog" class="window">         
      <div id="popupfoot"> <a href="#" class="close agree" title="close window">x</a></div>            
         <div class="bs-example">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">  
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner bigbanner">
                  <div class="item active">			
                     <img src="/whiteboard/images/live-video-chat.jpg" title="Live Video Chat">
                  </div>
                  <div class="item">	
                     <img src="/whiteboard/images/upload_presentations.jpg" title="Upload Presentations">
                  </div>
                  <div class="item">	
                     <img src="/whiteboard/images/online_presentation.jpg" title="Online Presentations">
                  </div>
                  <div class="item">
                     <img src="/whiteboard/images/upload-download-presentation.jpg" title="Upload/Download Presentation">
                  </div>
                  <div class="item active">			
                     <img src="/whiteboard/images/change-background.jpg" title="Change Background Color">
                  </div>
                  <!-- Carousel controls -->
                  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                     <span class="fa-angle-left"></span>
                  </a>
                  <a class="carousel-control right" href="#myCarousel" data-slide="next">
                     <span class="fa-angle-right"></span>
                  </a> 
               </div>
            </div>
         </div>          
   </div>
   <div id="mask"></div>
</div> --}}
<!-- end of popup html code -->


<!--HEADER STARTS -->
<div data-options="region:'north'" style="height:65px; width:100%;overflow:hidden;">   
   <div id="invite" class="easyui-dialog" title="Meeting Invitation" style="width:600px;height:250px;" data-options="iconCls:'icon-email',resizable:true,modal:true, onOpen:function(){$('.imgLoader').css('visibility', 'hidden');}, onClose:function(){if( $('#center').children().filter('video').length == 0 ){$('.imgLoader').css('visibility', 'visible');}}">
      <div id="eids" class="easyui-validatebox" data-options="required:true,validType:'emails', prompt:'Enter Email IDs separated by comma...',buttonText:'Invite'" style="width:70%;height:32px;"></div>
   </div>
   <div id="videocontext" class="easyui-menu" style="width:150px;">
     <div id="muteUser" data-options="iconCls:'fa-microphone-slash-small'">Mute User</div>
     <div id="unmuteUser" data-options="iconCls:'fa-microphone-small'">Unmute User</div>
   </div>
   <div id="sign" class="easyui-window" title="Whiteboard" data-options="iconCls:'icon-login',modal:true, maximizable:false, closed:true, minimizable:false" style="width:530px;height:475px;padding:10px;">
   </div>
   <div id="dlg" class="easyui-dialog" title="Meeting" style="width:500px;height:250px;" data-options="iconCls:'icon-chat-small', resizable:true, modal:true, buttons: '#dlg-buttons'">
      <div style="margin-bottom:10px">
      <input class="easyui-textbox" id="room_id" style="width:80%;height:40px;padding:12px" data-options="prompt:'Enter a unique room ID',iconCls:'icon-lock',iconWidth:38">
      </div>
      <div style="margin-bottom:20px">
      <input class="easyui-textbox" id="user_name" style="width:80%;height:40px;padding:12px" data-options="prompt:'Enter your name', iconCls:'icon-man',iconWidth:38">
      </div>
   </div>
   
   <div id="ancTutorContent" class="easyui-window" title="Whiteboard" data-options="iconCls:'icon-login',modal:true, maximizable:false, closed:true, minimizable:false" style="width:530px;height:200px;padding:10px;">
   </div>
   
   <div id="dlg-buttons" style="text-align:center;">
      <a href="javascript:void(0)" class="easyui-linkbutton" id="create_meeting_room">Create Meeting Room</a>
      <a href="javascript:void(0)" class="easyui-linkbutton" id="join_meeting_room">Join Meeting Room</a>
   </div>
   <a href='http://localhost/alkhizra/newwhiteboard'>
      <img src="http://www.eatlogos.com/education_logos/png/m-letter-with-book-logo-design.png" height="50px" style="padding:5px; float:left;"/>
   </a>
   <h1 class="whtboard">ALKHIZRA</h1>

   <!-- header top right menu first -->      
   <div style="margin:18px 0px 0px 0px;">
      <div class="db-nav">
         <a href="javascript:void(0);" id="ancUndo" title="Undo">
            <div class="sub-default-lft" style="border-right:none;"><i class="fa-undo wbitem"></i></div>
         </a>
         <a href="javascript:void(0);" id="ancRedo" title="Redo">
            <div class="sub-default-lft" style="border-right:none;"><i class="fa-repeat wbitem"></i></div>
         </a>
         <a href='javascript:void(0)'  title="Clear all" class="clrDynamicCanvas">
            <div class="sub-default-lft wbitem" style="border-right:none;"><img src="whiteboard/images/clear.png" style="vertical-align:bottom; height:17px;"/></div>
         </a>
         {{-- <a href='javascript:void(0)' id="maximize" title="Maximize" >
            <div class="sub-default-lft" ><i class="fa-expand"></i></div>
         </a> --}}
         <a href='javascript:void(0)' id="refresh" title="Refresh Connection">
            <div class="sub-default-lft" ><i class="fa-refresh"></i></div>
         </a>   
         {{-- <a href="javascript:void(0);" id="ancHelpMain" title="Help Whiteboard">
           <div class="sub-default-lft" style="border-right:none;"><img src="theme/css/icons/help.png" /></div>
         </a>       --}}
      </div>
   </div> 
   <!-- end of header top right menu first -->   
   
</div>
</div>
<!--HEADER ENDS -->

<div id="east" data-options="region:'east', title:'Meeting',iconCls:'icon-chat-small', split:false, collapsed:false" style="width:300px;">
   <div id="webrtcPanel" class="easyui-layout" data-options="fit:true,border:false">
      <div data-options="region:'north',split:true" style="height:322px; border:0px;">
         <div class="video-control">
            <div id="containerUserFaces">
               <h2>Waiting for participants to join</h2>
            </div>
            <div class="db-nav chat-nav-center">
               <div id="containerBigVideoAndFullscreen">
                  <div id="containerBigVideo">
                     <i class="fa-user-large chatitem"></i>
                  </div>
               </div>
            </div>
            <div class="db-nav chat-nav-center">
               <a href="javascript:void(0);" id="btnShareVideo" title="Share Video">
                  <div class="sub-default-lft" style="border-right:none;"><i class="fa-video-camera-small chatitem"></i></div>
               </a>
               <a href="javascript:void(0);" id="btnShareAudio" title="Unmute">
                  <div class="sub-default-lft" style="border-right:none;"><i class="fa-microphone-small chatitem"></i></div>
               </a>
               <a href="javascript:void(0);" id="btnSendInvite" title="Send Invite">
                  <div class="sub-default-lft" style="border-right:none;"><i class="fa-envelope-o chatitem"></i></div>
               </a>
               <a href="javascript:void(0);" id="btnMuteAll" title="Mute All">
                  <div class="sub-default-lft" style="border-right:none;"><i class="fa-volume-off chatitem"></i></div>
               </a>
               <a href="javascript:void(0);" id="btnRaiseHand" title="Raise Hand">
                  <div class="sub-default-lft" style="border-right:none;"><i class="fa-raise-hand-small chatitem"></i></div>
               </a>
               <a href="javascript:void(0);" id="btnEnlargeVideo" title="Enlarge Video">
                  <div class="sub-default-lft" style="border-right:none;"><i class="fa-expand-small chatitem"></i></div>
               </a>
            </div>
         </div>
      </div>
      <div data-options="region:'center'" id="chatParent" style="overflow:hidden; border:0px;">
         <div id="chatContainer"> </div>
      </div>
      <div data-options="region:'south',split:false" style="width:100%; border:0px;">
         <div id="chat-input-box" style="border:1px solid #eee; border-left:0px solid;">
            <input id="input-box" class="easyui-textbox" data-options="buttonText:'Send',prompt:'Enter your text here...',iconWidth:22" style="width:100%; height:40px; border-radius:0px; -webkit-border-radius:0px; -moz-border-radius:0px">
         </div>
      </div>
   </div>   
</div>

<!--Left Navigation starts --> 
<div id="west" data-options="region:'west', title:'',iconCls:'', split:false, collapsible:false" style="width:55px;">
   <div class="wr-left">
      <div class="wr-lft-cont column">
         <div class="sub-default clickDisable" id="lftMainmenu">
             <a href="javascript:void(0);" id="ancSelect" title="Select Tool">
               <div class="sub-default-lft"><i class="fa-mouse-pointer"></i></div>
            </a>
             <a href="javascript:void(0);" id="ancBackground" title="Background">
               <div class="sub-default-lft"><i class="fa-circle wbitem"></i></div>
             </a>
             {{-- <a href="javascript:void(0);" id="ancPattern" title="Pattern">
               <div class="sub-default-lft" ><img src="whiteboard/images/pattern-icon.png" style="border:1px solid #ccc;border-radius:60px;"/ crossorigin="anonymous"></div>
             </a> --}}
             <a href="javascript:void(0);" id="ancPencil" title="Pencil">
               <div class="sub-default-lft" style="border-right:none;"><i class="fa-pencil wbitem" style="font-size:120%;"></i></div>
             </a>
             <a href='javascript:void(0)' id="ancEraser" title="Eraser">
               <div class="sub-default-lft"><i class="fa-eraser"></i></div>
             </a>
             <a href="javascript:void(0);" id="ancShape" title="Shapes">
               <div class="sub-default-lft" style="border-right:none;"><img src="whiteboard/images/shape-sm.png" /></div>
             </a>
             <a href="javascript:void(0);" id="ancText" title="Text">
               <div class="sub-default-lft" style="border-right:none;"><i class="fa-text-height"></i></div>
             </a> 
             <a href="javascript:void(0);" id="ancImage" title="Image">
               <div class="sub-default-lft" style="border-right:none;"><i class="fa-file-image-o"></i></div>
             </a>                         
{{--                
            <a href="javascript:void(0);" id="ancTutorConnect" title="Tutor Connect Content Presentation">
               <div class="sub-default-lft" style="border-right:none;"><img src="theme/css/icons/image-editor.png" /></div>
            </a>              --}}
            {{-- <a href="javascript:void(0);" id="ancStartChat" title="Meeting">
               <div class="sub-default-lft" style="border-right:none;"><img src="theme/css/icons/chat_room.png" /></div>
            </a> 		              --}}
            <a href="javascript:void(0);" id="ancDownload" title="Download/Upload">
               <div class="sub-default-lft" style="border-right:none;"><img src="whiteboard/images/up-down.png" /></div>
            </a>
            <a href="javascript:void(0);" id="ancDownload" title="Download/Upload">
               <div id="delSession" class="sub-default-lft" style="border-right:none;"><img src="whiteboard/images/up-down.png" /></div>
            </a>
         </div>
      </div>
    </div>           
</div>
<!--End of Left Navigation -->

<!--BOTTOM STARTS -->
<div id="south" data-options="region:'south',iconCls:'icon-image-editor', title:'Slides', split:false,collapsible:true" style="height:115px">
</div>
<!--BOTTOM ENDS -->

<!--STAGE STARTS -->
<div id="center" data-options="region:'center'" style="height:100%">
   <div id="stage">
      <canvas id="canvasBoard"></canvas>
      <!--WebRTC block -->
      <!-- placeholder for shared part of the screen(from the user side) -->
      <div id="containerSharedPartOfScreenPreview" style="display:none;">
        <img id="sharedPartOfScreenPreview"  style="max-width:100%;"/>
      </div>
      <!--END WebRTC block -->         
   </div>
   <!-- header top right menu second -->         
   <div class="wr-rgt">
      <div class="wr-rgt-cont">
        
        <!-- code of background color picker -->
         <div class="subProperties left-meni-slide" id="bgColorpick" style="min-height:306px; max-height:100%;">
            <div class="icon-curve icon-bgcolor" style="background:transparent !important"></div>
            <div class="sub-tools items">
               <a href="javascript:void(0);" class='clsBgColor bgcrcle'><div class="blck-bgpicker"></div>
               </a>            
               <a href="javascript:void(0);" class='clsBgColor bgcrcle'><div class="red-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsBgColor bgcrcle'><div class="green-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsBgColor bgcrcle'><div class="yellow-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsBgColor bgcrcle'><div class="blue-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsBgColor bgcrcle'><div class="white-bgpicker"></div></a> 
               <a href="javascript:void(0);" class='bgcrcle'>
                  <input type="color" id="txtBgColorVal" class="form-control picker" value="#000000">            
               </a>
            </div>          
         </div>
         <!-- end of code for background color picker -->
                   
         <!-- code of patterns -->
         <div class="subProperties left-meni-slide" id="bgPattern" style="min-height:312px; max-height:100%;">
            <div class="icon-curve icon-bgpattern"></div>
           <div class="sub-tools items">
              <a href="javascript:void(0);" class='clsBgColor bgcrcle h30' title="Guidelines">
                 <div class="bgclpkr bgpatterns"><img src="whiteboard/images/transparent-guidelines.png" / crossorigin></div>
              </a>
              <a href="javascript:void(0);" class='clsBgColor bgcrcle h30' title="Book Guidelines">
                 <div class="bgclpkr bgpatterns"><img src="whiteboard/images/transparent-booklines.png" / crossorigin></div>
              </a>
              <a href="javascript:void(0);" class='clsBgColor bgcrcle h30' title="Transparent Background">
                 <div class="bgclpkr bgpatterns"><img src="whiteboard/images/transparent.png" / crossorigin></div>
              </a>
              <a href="javascript:void(0);" class='clsBgColor bgcrcle h30' title="Guidelines">
                 <div class="bgclpkr bgpatterns"><img src="whiteboard/images/transparent-diamond.png" / crossorigin></div>
              </a>
              <a href="javascript:void(0);" class='clsBgColor bgcrcle h30' title="Book Guidelines">
                 <div class="bgclpkr bgpatterns"><img src="whiteboard/images/transparent-lgap.png" / crossorigin></div>
              </a>
              <a href="javascript:void(0);" class='clsBgColor bgcrcle h30' title="Transparent Background">
                 <div class="bgclpkr bgpatterns"><img src="whiteboard/images/transparent-checkered.png" / crossorigin></div>
              </a>   
              <a href="javascript:void(0);" class='bgcrcle' title="Transparent Background" style="padding:3px 5px 4px 7px!important;">
                <form method="post" enctype="multipart/form-data">       
                   <input type="file" id="filePattern" name="filePattern" title="Upload Pattern from Computer"/ crossorigin>	               
                </form>
                <div class="fileuploadph" id="btnUploadPattern" title="Upload Pattern from Computer"><i class="fa-upload"></i></div>
              </a>              
           </div>
         </div>
         <!-- end of code patterns -->
         
         <!-- code of pencil -->
         <div class="subProperties left-meni-slide" id="penEdit" style="min-height:345px; max-height:100%;">  
           <div class="icon-curve icon-pendit"></div>
           <div class="sub-tools">          
             <div class="items" style="margin:0px 51px 0px 0px;">            
               <a href="javascript:void(0);" class='clsPencilColor bgcrcle'>
                   <input type="color" id="txtPencilClrVal" class="form-control picker" value="#000000"> 
               </a>            
               <a href="javascript:void(0);" class='clsPencilColor bgcrcle'><div class="blck-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsPencilColor bgcrcle'><div class="red-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsPencilColor bgcrcle'><div class="green-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsPencilColor bgcrcle'><div class="yellow-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsPencilColor bgcrcle'><div class="white-bgpicker"></div></a>
               <a href="javascript:void(0);" class='clsPencilColor bgcrcle'><div class="blue-bgpicker"></div></a>
             </div>
             <input id="lineSlide" name="lineSlide" value="2"  />
           </div>        
         </div>
         <!-- end of code for pencil-->
         
         <!-- code for eraser--> 
         <div class="subProperties left-meni-slide" id="eraseOptions" style="min-height:43px; max-height:100%;">
           <div class="icon-curve icon-eraseoption"></div>
           <div class="sub-tools">      
             <input id="eraserSlide" name="eraserSlide" value="2" />
           </div>
         </div>
         <!-- end of code for eraser-->
         
         <!-- code of shapes -->
         <div class="subProperties left-meni-slide" id="shapeOptions" style="min-height:351px; max-height:100%;">
           <div class="icon-curve icon-shpeoption"></div>
           <div class="sub-tools items">
             <a href="javascript:void(0);" class='shapeFillColor bgcrcle'>                      
                <input type="color" id="txtFillClrVal" class="form-control picker" value="">
             </a>                              
             <a href="javascript:void(0)" class="" id="shapeRect" title="Rectangle" data-style='rectangle'>
               <img src="whiteboard/images/rectangle-sm.png" title="Rectangle"/></a> 
             <a href="javascript:void(0)" class="" id="shapeSquare" title="Square" data-style='square'>
               <img src="whiteboard/images/square-sm.png" title="Square"/></a>
             <a href="javascript:void(0)" class="" id="shapeCircle" title="Circle" data-style='circle'>
               <img src="whiteboard/images/circle-sm.png" title="Circle"/></a>
             <a href="javascript:void(0)" class="" id="shapeTriangle" title="Triangle" data-style='triangle'>
                <img src="whiteboard/images/triangle-sm.png" title="Triangle"/></a>
             <a href="javascript:void(0)" class="" id="shapeLine" title="Line" data-style='line'>
                <img src="whiteboard/images/line-sm.png" title="Line"/></a>
             <a href="javascript:void(0)" class="" id="shapeEllipse" title="Ellipse" data-style='ellipse'>
                <img src="whiteboard/images/ellipse-sm.png" title="Ellipse"/></a>               
             <a href='javascript:void(0)' class="eraser" id="btnRemoveShape" title="delete"><div class="trash-bgpicker" style="border:none!important;">
             <i class="fa-trash"></i></div></a>
           </div>                     
           <!-- <input type="text" id="txtShapeOutline" value="2" class="input-align" style="width:18%; float:left;"/>  
           <input type="color" id="txtShapeOutlineClrVal" class="form-control" value="#000000" style="width:23px; float:left;"> 
           <input type="text" id="txtShapeOutlineHexavalue" value="#000000" style="width:58%;float:left;margin:0px 5px 0px 4px;"/>-->
         </div>
         <!-- end of code for shapes -->
           
         <!-- HTML of Text -->
         <div id="textOptions" class='subProperties left-meni-slide' style="min-height:135px; max-height:100%;">
            <div class="icon-curve icon-txtoptions"></div>
            <div id="dd">
               <div class="sub-tools items">
                 <a href="javascript:void(0)" id="btnNewText" title="Add New Text"><i class="fa-plus trashh"></i></a>
                 <a href="javascript:void(0)" id="btnRemoveText" title="Delete Text"><i class="fa-trash trashh"></i></a>
                 <a href="javascript:void(0)" id="btnShowMenu" title="Show Text Menu"><i class="fa-bars trashh"></i></a>
               </div>            
             </div>   
           </div>                
         <!-- End of HTML Text -->
         
         <!-- HTML of Image -->
         <div id="imageOptions" class='subProperties left-meni-slide' style="min-height:91px; max-height:100%;">
            <div class="icon-curve icon-imgoptions"></div>
            <div class="sub-tools items">            
               <a href="javascript:void(0)" id="btnNewImage" title="Add New Image"><i class="fa-upload trashh" style="font-size:130%!important;"></i></a>
               <a href="javascript:void(0)" id="btnRemoveImage" class='clsCance' title="Remove Image"><i class="fa-trash trashh"></i></a>  
               <div class="text-tool sub-tools-cat" id="catOne">               
                  <form method="post" enctype="multipart/form-data" id="imageForm" >       
                     <input type="file" id="fileImage" name="fileImage" title="Upload Image from Computer">
                  </form> 
                  <div style="clear:both;"></div>                
               </div>   
            </div>               
         </div> 
         <!-- End of HTML Image -->
         
         <!-- code of download -->
         <div class="subProperties left-meni-slide" id="downloadOptions" style="min-height:145px; max-height:100%;">
            <div class="icon-curve icon-dwnldoptions"></div>
            <div class="sub-tools items">
              <a href='javascript:void(0)' id="ancDwnJson" title="Download as Board" >
                  <img src="whiteboard/images/download_board.png" class="fa-dwnload" style="width:21px; height:22px;border-radius:0px;"/></a>
              <a href='javascript:void(0)' id="ancDwnJpeg" title="Download as JPEG">
                  <img src="whiteboard/images/download_jpeg.png" class="fa-dwnload" style="width:21px; height:22px;border-radius:0px;"/></a>                           
              <a href='javascript:void(0)'>
                <form method="post" enctype="multipart/form-data" id="uploadForm">       
                   <input type="file" id="fileJson" name="fileJson" title="Upload Board from Computer">
                </form>             
                <div class="fileupload" id="btnUpload" title="Upload Board from Computer"><i class="fa-upload fa-fupload"></i></div>
              </a>
               <div class="clear"></div>  
            </div>
         </div>
         <!-- end of code for download -->
         
     </div>   
   </div>
   <div class="wr-rgt">
      <div class="wr-rgt-cont">
         <div id="btnDisplayMenu" class="textdisplay"> 
              <div class="c-two">
                <select id="txtStyle"> 
                    <option value='Times New Roman'>Times New Roman</option>
                    <option value='Arial'>Arial</option>                        
                    <option value='Helvetica'>Helvetica</option>
                    <option value='sans-serif'>Sans-serif</option>
                    <option value='Impact'>Impact</option>
                    <option value='Open Sans Condensed'>Open Sans Condensed</option>                     
                    <option value='Poiret One'>Poiret One</option>
                    <option value='Lobster'>Lobster</option>                        
                    <option value='Shadows Into Light'>Shadows Into Light</option>
                    <option value='Pacifico'>Pacifico</option>
                    <option value='Sigmar One'>Sigmar One</option>
                    <option value='Courgette'>Courgette</option>                   
                    <option value='Lobster Two'>Lobster Two</option>
                    <option value='Pinyon Script'>Pinyon Script</option>
                    <option value='Playball'>Playball</option>                     
                    <option value='Satisfy'>Satisfy</option>
                    <option value='Great Vibes'>Great Vibes</option>                        
                    <option value='Tangerine'>Tangerine</option>
                    <option value='Luckiest Guy'>Luckiest Guy</option>
                </select>
               </div>
              <div class="clear"></div>              
              <div class="c-two">
                  <div id="alignleft" class="c-two-three divAlign" data-opt="left"><a href="javascript:void(0);" ><i class="fa-align-left c-border" ></i></a></div>
                  <div id="aligncenter" class="c-two-three divAlign" data-opt="center"><a href="javascript:void(0);" ><i class="fa-align-center c-border"></i></a></div>
                  <div id="alignright" class="c-two-three divAlign" data-opt="right"><a href="javascript:void(0);" >
                  <i class="fa-align-right c-border"></i></a></div>
                  <div id="stylebold" class="c-two-three divStyleBold" data-opt="bold"><a href="javascript:void(0);" ><i class="fa-bold c-border"></i></a></div>
                  <div id="styleitalic" class="c-two-three divStyleItalic" data-opt="italic"><a href="javascript:void(0);" ><i class="fa-italic c-border"></i></a></div>
              </div>
              <div class="clear"></div> 
              <div class="divider"></div>
              <textarea placeholder="Enter Text Here" cols="4" rows="3" id="txtText">Sample Text</textarea>
              <div class="divider"></div>               
              <div class="c-two">
                 <div class="c-two-three"> <a>Size:</a> <input type="text" id="txtTextSize" value="20" /> </div>
                 <div class="c-two-three" style="width:36%; padding-left:5px!important;"> <a>Color:</a><div class="clear"></div><input type="color" id="txtClrVal" class="form-control" value="#000000"> <input type="text" id="txtHexavalue" value="#000000" />
                 </div>
                 <div class="c-two-three" style="width:36%;"> <a>Background:</a><div class="clear"></div> <input type="color" id="txtBGClrVal" class="form-control" value="#000000"> <input type="text" id="txtBGHexavalue" value="#000000" /> </div><div class="clear"></div>
              </div>
              <div class="divider"></div>
              <div class="c-two"> 
               <div class="c-two-two" style="width:99%!important; text-align:left;"> 
                  <a>Border:</a><div class="clear"></div> 
                  <input type="text" id="txtOutline" value="0" style="width:35%; float:left;"/>  
                  <input type="color" id="txtOutlineClrVal" class="form-control" value="#000000" style="width:23px; float:left; margin:-2px 0px 0px 6px; height:22px;"> 
                  <input type="text" id="txtOutlineHexavalue" value="#000000" style="width:36%;float:left;padding:0px 5px; margin:-3px 0px 0px 4px;"/>
               </div>
              </div><div class="clear"></div> 
            </div>
      </div>            
   </div>
   
   <!-- code of Help -->      
   <div class="subProperties helpclas" id="helpOptions">
      <div class="sub-tools" style="right:0px!important; background:#fff!important; margin:0px!important;">  
         <div class="easyui-accordion" style="width:242px;" > 
            <div title="Background" data-options="iconCls:''" style="overflow:auto;padding:0px;">
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-background-color'>How to use Background Tool</a></div>
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-background-patterns'>How to use Background Patterns</a></div>
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-background-upload-image'>How to use Upload Image</a></div>                 
            </div>               
            <div title="Pencil" data-options="iconCls:''" style="overflow:auto;padding:0px;">
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-pencil-width'>How to use Pencil Tool</a></div>        
            </div>
            <div title="Erase" data-options="iconCls:''" style="overflow:auto;padding:0px;">
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-erase'>How to use Erase Tool</a></div>        
            </div>
            <div title="Shape" data-options="iconCls:''" style="overflow:auto;padding:0px;">
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-shape-icons'>How to use Shapes</a></div>
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-shape-colour'>How to use Shape Background Fill</a></div>
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-shape-border'>How to use Shape Border</a></div>                 
            </div> 
            <div title="Text" data-options="iconCls:''" style="overflow:auto;padding:0px;">
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-text-addtext'>How to Add Text</a></div>
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-text-fontfamily'>How to Add Font Family to Text</a></div>  
               <div class="help-acc"><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-text-bold'>How to Add Bold to Text</a></div>
               <div class="help-acc"><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-text-changetext'>How to Edit Text</a></div>
               <div class="help-acc"><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-text-textbgcolor'>How to Add Bakground Color, Font-size, Color</a></div>
               <div class="help-acc"><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-text-textbordercolor'>How to Add Border to Text</a></div>
            </div> 
            <div title="Image" data-options="iconCls:''" style="overflow:auto;padding:0px;">
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-image-addremove'>How to use Image Tool</a></div>        
            </div>
            <div title="Upload/Download" data-options="iconCls:''" style="overflow:auto;padding:0px;">
               <div class="help-acc" ><a class="ancHelp" href="javascript:void(0)" alt='how-to-use-download-upload'>How to use Upload/Download Tool</a></div>        
            </div>
          </div>
      </div>
   </div>
   <div id="helpWindow" class="easyui-window" title="Help Guide for Whiteboard" data-options="iconCls:'icon-help'" style="width:955px;height:500px;">
   </div>
      
      <input type="hidden" id="userId" value="{{Auth::User()->id}}">
      <input type="hidden" id="nameInput" class="form-control form-control-sm" type="text" value="{{Auth::User()->name}}">
      <input type="hidden" id="roleId" class="form-control form-control-sm" type="text" value="{{Auth::User()->roleId}}">
      <input type="hidden" id="classId" class="form-control form-control-sm" type="text" value="{{$classId}}">


<script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.3.1/firebase-database.js"></script>
<script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
<script src="{{ asset('/public/js/tutorialspoint.js') }}"></script>
<script src="{{ asset('/public/js/whiteboard.js') }}"></script>
<script src="theme/js/lightslider.js"></script>
<script src="https://www.google-analytics.com/urchin.js"></script>
<script type="text/javascript">
_uacct = "UA-232293-6";
urchinTracker();
</script>
</body>

