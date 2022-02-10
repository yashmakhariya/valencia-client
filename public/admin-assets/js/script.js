
// Disable submit button on form submit
$('form').submit(function(){
    $(this).find('button[type="submit"]').attr('disabled','disabled');
})