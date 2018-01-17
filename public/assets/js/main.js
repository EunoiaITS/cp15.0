(function(){

	/*--
	sidebar toggle class
	======================--*/
  $('#msbo').on('click', function(){
    $('body').toggleClass('msb-x');
  });

  /*--
  sidebar plus icon toggle class
  ============================--*/
  $(".panel-default a").on('click', function(){
  	$(this).toggleClass('click-color');
  });

  /*--
  sidebar menu bar icon toggle class
  ============================--*/
  $("#msbo").on('click', function(){
  	$(this).toggleClass('msbo-click');
  });

  /*===================
    view Popup and Page Functions 
    ===================*/
    $(".open-popup").on("click",function(){
        $(".popup-wrapper-view").fadeIn();
        return false;
    });
    $(".close").on("click",function(){
        $(".popup-wrapper-view").fadeOut();
    });


    /*===================
    view Popup price comparison 
    ===================*/

    $(".open-popup-comp").on("click",function(){
        $(".popup-wrapper-compa").fadeIn();
        return false;
    });
    $(".close").on("click",function(){
        $(".popup-wrapper-compa").fadeOut();
    });

    /*===================
    Popup delete section
    ===================*/

    $(".open-popup-delete").on("click",function(){
        $(".popup-wrapper-delete").fadeIn();
        return false;
    });
    $(".close").on("click",function(){
        $(".popup-wrapper-delete").fadeOut();
    });
}());

/*=======================================
        Datepicker init
      =========================================*/

      $('.datepicker-f').datetimepicker({
        format: "DD/MM/YYYY",
        icons: {
          up: 'fa fa-angle-up',
          down: 'fa fa-angle-down',
          previous: 'fa fa-angle-left',
          next: 'fa fa-angle-right',
        }
      });

      /*=======================================
        Timepicker init 
      =========================================*/

        $('.timepicker-f').datetimepicker({
        format: "HH:mm A",
        icons: {
          up: 'fa fa-angle-up',
          down: 'fa fa-angle-down',
          previous: 'fa fa-angle-left',
          next: 'fa fa-angle-right',
        }
      });