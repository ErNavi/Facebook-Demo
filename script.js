$(document).ready(function(){

$("#submit").click(function(){
var text = $("#text").val();

var dataString = 'value='+ text;
if(text=='')
{
alert("Please enter in the textarea");
}
else
{
// AJAX Code To send textarea value to newpost.php and then displaying it.
$.ajax({
type: "POST",
url: "newpost.php",
data: dataString,
cache: false,
success: function(result){
$.each(result, function(index) {

$("#text").val('');
         
$('<div/>',{

         'class' : 'status',
         'html' :  '<div><figure><image class="profile_pic" src="pics/blank.jpeg" alt="profile" style="float:left;margin-left:2%;margin-top:2%;" width="50" height="50" /><figcaption><span class="name" style="color:#3b5998">&nbsp;&nbsp; Sachin Tendulkar </span><br/>&nbsp;&nbsp; <span class="time" style="font-size:10px;">'+result[index].time+' minutes ago</span></figcaption></figure><br/><br/></div><div style="margin-left:2%;float:left"><p>'
                      +result[index].status+'</p></div>',


    }


    ).fadeIn('slow').prependTo( "div#status" );


            
        });

}
});
}
return false;
});
});	