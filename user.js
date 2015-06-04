$(document).ready(function(){
//Extractig URL Parameters so as to know users userID
var urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();

var dataString = 'value='+ urlParams['uId'];

//AJAX Code to user.php for getting info about the user and displaying it
$.ajax({
type: "POST",
url: "user.php",
data: dataString,
cache: false,
success: function(result){
    
$.each(result, function(index) {

var x=0
if(x==0){
$('label#name').text(result[index].uId); x++;
}
if(result[index].time>86400)
{
var t = Math.ceil(result[index].time/86400) + ' days ago';
}

else if(result[index].time>3600)
{
var t = Math.ceil(result[index].time/3600) + ' hours ago';
}

else if(result[index].time>60)
{
var t = Math.ceil(result[index].time/60) + ' minutes ago';
}
else
{
var t = Math.ceil(result[index].time) + ' seconds ago';
}
         
$('<div/>',{

         'class' : 'status',
         'html' :  '<div><figure><image class="profile_pic" src="pics/blank.jpeg" alt="profile" style="float:left;margin-left:2%;margin-top:1%;" width="50" height="50" /><figcaption>&nbsp;&nbsp; <a href="user.html?uId='+result[index].uId+'"><span class="name" style="color:#3b5998">'+result[index].id+'</span></a><br/>&nbsp;&nbsp; <span class="time" style="font-size:10px;">'+t+' </span></figcaption></figure><br/><br/></div><div style="margin-left:2%;float:left"><p>'
                      +result[index].status+'</p></div>',


    }


    ).prependTo( "div#status" );


    


            
        });

}
});

var col=1;

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