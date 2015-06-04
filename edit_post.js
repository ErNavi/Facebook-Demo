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
alert(urlParams['sId']);
$.ajax({
type: "POST",
url: "edit_post.php",
data: 'sId='+urlParams['sId'],
cache: false,
success: function(result){
$.each(result, function(index) {
    alert("hello");
$("textarea#text").val(result[index].status);
});
}
});

$("#submit").click(function(){
var text = $("#text").val();


var dataString = 'sId='+ urlParams['sId']+'&text='+text;

//AJAX Code to user.php for getting info about the user and displaying it
$.ajax({
type: "POST",
url: "edit_post.php",
data: dataString,
cache: false,
success: function(result){
    
alert("Post edited");

}
});


            
        });
});