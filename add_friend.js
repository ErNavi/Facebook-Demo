function add_friend(id)
{
//id is the userId of the person who is added as friend.
var text = id;


var dataString = 'value='+ text;
if(text=='')
{
alert("No id");
}
else
{
// AJAX Code using POST Method calling add_friend.php sending userId of the person who is added as friend.
$.ajax({
type: "POST",
url: "add_friend.php",
data: dataString,
cache: false,
success: function(result){
//On successfull addition of friends, remove him/her from the Suggested Friend's list.
$("#"+id).text(result[0].fName+" "+result[0].lName + " is now friend").css('font-size','12px');
   
$("."+id).fadeOut(1000, function(){
    
        $(this).remove();
});



}

});


}
}