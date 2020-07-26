(function($) {


    $('input[type="checkbox"]').click(function() {
        var a = $(this).attr("class");
        var no = a.split("_").pop();
        $('.inp_'+no).attr("name", this.checked ? "delivery_charge[]" : "");
        $('.inp_'+no).prop("disabled", this.checked ? false : true);
        $('.inp_'+no).prop("required", this.checked ? true : false);
    });


    $('#cash_memo').click(function(event) {
        if($('.box input:checkbox:checked').length > 0){

        }
        else{
            event.preventDefault(); 
            alert('please pay any bill');
        }   
    });


})(jQuery);