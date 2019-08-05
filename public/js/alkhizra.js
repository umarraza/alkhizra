$(document).on("click", "img", function(){
    $(this).text("It works!");
});

$(document).ready(function(){
    $("image-trigger").trigger("click");
});