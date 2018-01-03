
$(".fb-signup-btn").click(function(){
     $(this).closest(".fb-signup-btn-wrapper").addClass("success");
     $(this).prop('disabled', 'true');

});
