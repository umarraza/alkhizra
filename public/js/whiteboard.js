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
	
	setInterval(() => {

		var canvasContainer = document.getElementsByClassName('canvas-container');
		canvasContainer[0].setAttribute("id", "myCanvas");
		var c        =  document.getElementById("canvasBoard");
		var image64  =  c.toDataURL();
		var classId  =  document.getElementById('classId').value;
		var roleId   =  document.getElementById('roleId').value;
		var userRef  =  this.database.ref('class/' + classId);
		userRef.set({
			'image': image64,
			'classId': classId,
			'roleId': roleId
		});
	}, 100);


