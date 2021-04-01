$("document").ready(function(){
    $("body").on('click','.vue-swatches__diagonal',function(){
        $(".vue-swatches").closest('.card.overflow-hidden').removeClass('overflow-hidden');

    });

    // $('body').on('change', '#disable_wheel_motion_for_this_car', function(){
    //     if($("#disable_wheel_motion_for_this_car").prop("checked")){
            
    //     }else{
            

    //     }

    // });
    $('body').on('focusout', 'input[dusk*="key-value-key-"]', function(){
        // alert("Burred");
        let input = $(this);
        setTimeout(function(){ 
            console.warn(input.val());
           if( !specs.includes(input.val())){
                if(input.val().trim() == ''){
                    return;
                }
                input.val('');
                input.closest('.key-value-item').addClass("sss");
                input.closest('.key-value-item').find("button[title='Delete']").first().trigger('click');
                alert("You must select a specification title from the list.");
                // input.focus();
           }
           

        }, 500);

        return true;
    });

});
