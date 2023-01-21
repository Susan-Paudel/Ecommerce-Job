$(document).on('pageinit', function(event){
    $("body").on("swipeleft",function(){
        $("#main-nav-wrapper").addClass("show-menu");
    });
});
$(document).on('pageinit', function(event){
    $("body").on("swiperight",function(){
        $("#checkout").addClass("show");
    });
});