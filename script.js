
// SCRIPT NY HAMBURGER MENU

$("#wrapper").click( function() {
	$(".icon").toggleClass("close");
});


// SLIDE DOWN NAVIGATION
$(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
        } else {
            $(".item").addClass("active");
        }
    });
});
