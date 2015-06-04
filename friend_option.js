//on page ready displaying list of all suggested friends using AJAX call to friend_option.php
$(document).ready(function(){

$.ajax({
type: "POST",
url: "friend_option.php",
data: 1,
cache: false,
success: function(result){
$.each(result, function(index) {
         
$('<div/>',{

         'class' : result[index].uId,
         'html' :  '<div><figure><image src="pics/blank.jpeg" width="50" height="50" style="float:left;margin-right:4%"/><figcaption> '+result[index].fName +' '+ result[index].lName+'  </figcaption></figure><a href="javascript:void(0);"  id="'+result[index].uId+'" onclick="add_friend(this.id)" class="add">add friend</a></div><br/><br/>',
         


    }


    ).appendTo( "div#friend_options" );


            
        });

}
});
});	
