
(function($) {
    
    $("#menu-list").on('scroll', function() {
        $val = $(this).scrollLeft();
      //   console.log($val);
  
        if($(this).scrollLeft() + $(this).innerWidth()>=$(this)[0].scrollWidth){
          // console.log($(this).innerWidth());
           $(".nav-next").hide();
        } else { 
           $(".nav-next").show();
        }
  
        if($val == 0){
            $(".nav-prev").hide();
            // $('#menu-list').css('margin','0px 10px 0px 0px');
            // $('#menu-list').css('width','75%');
        } else {
            $(".nav-prev").show();
            // $('#menu-list').css('margin','0px 10px 0px 10px');
            // $('#menu-list').css('width','73%');
        }
    });
  //   console.log( 'init-scroll: ' + $(".nav-next").scrollLeft() );
    $(".nav-next").on("click", function(){
        $("#menu-list").animate( { scrollLeft: '+=460' }, 200);
        
    });
    $(".nav-prev").on("click", function(){
        $("#menu-list").animate( { scrollLeft: '-=460' }, 200);
    });
    
  
  
  
  })(jQuery);
  