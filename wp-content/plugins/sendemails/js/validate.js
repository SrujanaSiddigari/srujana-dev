
jQuery(document).ready(function(){
jQuery("#tbl").DataTable({
paging:true,
scrollY:400,
searching:true
});
});

jQuery(document).ready(function($) {
 

  jQuery("button").click(function(){
     // alert("hi");
      jQuery('#formid').validate({
        rules:{
            "nam":{
                required:true
            },
            "phone":{
                required:true,
                minlength:10,
                digits:true
            },
            "msg":{
                required:true 
            }
        },       
        messages:{
            required: "this field is required",
            minlength: "this field must contain at least {0} characters",
            digits: "this field can only contain numbers"
        }

 });
}); 
 });
