//dispalying the list of all friends sending AJAX call to friends.php using POST Method

$(document).ready(function(){
var col=1;
var dataString = 'value=4';
$.ajax({
type: "POST",
url: "friends.php",
data: dataString,
cache: false,
success: function(result){
$.each(result, function(index) {
	if(col==1){
         
$('<div/>',{

         'class' : 'status',
         'html' :  '<div><figure><image src="pics/blank.jpeg" width="50" height="50" style="float:left;margin-left:10%;margin-top:2%"/><figcaption></figcaption></figure>&nbsp;&nbsp;<a href="user.html?uId='+result[index].uId+'">'
         +result[index].fName +' '+ result[index].lName+'</a><br/></div>',


    }


    ).appendTo( "div#col1" );
	col=2;
	}
	else
	{
		$('<div/>',{

         'class' : 'status',
         'html' :  '<div><figure><image src="pics/blank.jpeg" width="50" height="50" style="float:left;margin-left:10%;margin-top:2%"/><figcaption></figcaption></figure>&nbsp;&nbsp;<a href="user.html?uId='+result[index].uId+'">'
         +result[index].fName +' '+ result[index].lName+'</a><br/></div>',


    }


    ).appendTo( "div#col2" );
	col=1;
	}	
            
        });

}
});
});	