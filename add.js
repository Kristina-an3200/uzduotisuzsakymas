$(document).ready(function() {
    var wrapper         = $("#orders_form"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var newItems = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
            newItems++; //text box increment

            $(wrapper).append('<div class="form-group">' +
                '<input type="text" name="new['+newItems+'][name]"> ' +
                '<input type="text" name="new['+newItems+'][quantity]"> ' +
                '<input type="text" name="new['+newItems+'][price]"> ' +
                '<a href="#" class="remove_field">X</a></div>'); //add input box
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent().remove();
    })
});