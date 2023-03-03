function chk_newsletter()

{

	if (test(document.frm_newsletter.signup,":.. Please enter your Valid Email Address.:")==false) return false;

}

function chk_quote()

{

if (checkempty(document.frm_quote.fname,":.. Please enter your name.:")==false) return false;

if (checkempty(document.frm_quote.phone,":.. Please enter your phone number.:")==false) return false;

if (test(document.frm_quote.email,":.. Please enter your Valid Email Address.:")==false) return false;

if (checkempty(document.frm_quote.secure,":.. Please enter Security Code.:")==false) return false;

return true;

}

function request()

{

if (checkempty3(document.frm_req.fname,":.. Please enter your Name.:")==false) return false;

if (checkempty3(document.frm_req.phone,":.. Please enter your Phone No.:")==false) return false;

if (test(document.frm_req.email,":.. Please enter your Valid E-mail Address.:")==false) return false;

return true;

}

function distribution()

{

if (checkempty3(document.frm_req.fname,":.. Please enter your Name.:")==false) return false;

if (test(document.frm_req.email,":.. Please enter your Valid E-mail Address.:")==false) return false;

return true;

}

function frm_mail()

{

if (test(document.frm_chk.loginid,":.. Please enter your Valid Email Address.:")==false) return false;

return true;

}

function checkform4()

{

if (test(document.frm_chk2.loginid,":.. Please enter your Valid Email Address.:")==false) return false;

return true;

}

function chk_feed()

{

if (checkempty3(document.frm_feed.ptitle,":.. Please Select your Salutation.:")==false) return false;

if (checkempty3(document.frm_feed.pname,":.. Please enter your Name.:")==false) return false;

if (checkempty3(document.frm_feed.company,":.. Please enter your Company Name.:")==false) return false;

if (test(document.frm_feed.country,":.. Please Select your Country.:")==false) return false;

if (test(document.frm_feed.phone,":.. Please enter your Phone No.:")==false) return false;

if (test(document.frm_feed.email,":.. Please enter your Valid E-mail Address.:")==false) return false;

if (test(document.frm_feed.message,":.. Please enter your Message.:")==false) return false;

return true;

}
function chk_application()

{

if (checkempty3(document.frm_application.ptitle,":.. Please Select your Salutation.:")==false) return false;

if (checkempty3(document.frm_application.pname,":.. Please enter your Name.:")==false) return false;

if (checkempty3(document.frm_application.company,":.. Please enter your Company Name.:")==false) return false;

if (test(document.frm_application.country,":.. Please Select your Country.:")==false) return false;

if (test(document.frm_application.phone,":.. Please enter your Phone No.:")==false) return false;

if (test(document.frm_application.email,":.. Please enter your Valid E-mail Address.:")==false) return false;

if (test(document.frm_application.message,":.. Please enter your Message.:")==false) return false;

return true;

}

function chk_search()

{

if (checkempty3(document.frm_search.tsearch,":.. Please enter any keywords.:")==false) return false;

return true;

}

function checkempty3(obj,msg)

{

 if(obj.value=="")

 {

  alert(msg);

  obj.focus();

  return false;

 }

}

function test(obj,msg) {

		  var regex = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;

		  if (regex.test(obj.value))

		  {

			return true;

		  }

		  else{

			alert(msg);

			obj.focus();

			return false;

		  }

		}

function del_firm(delUrl) {

  if (confirm("Are you sure you want to delete")) {

    document.location = delUrl;

  }

}

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)

var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only



if (document.getElementById){ //DynamicDrive.com change

document.write('<style type="text/css">\n')

document.write('.submenu{display: none;}\n')

document.write('</style>\n')

}



function SwitchMenu(obj){

	if(document.getElementById){

	var el = document.getElementById(obj);

	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change

		if(el.style.display != "block"){ //DynamicDrive.com change

//			for (var i=0; i<ar.length; i++){

			for (var i=0; i<ar.length; i++){

				if (ar[i].className=="submenu") //DynamicDrive.com change

				ar[i].style.display = "none";

			}

			el.style.display = "block";

		}else{

			el.style.display = "none";

		}

	}

}



function get_cookie(Name) { 

var search = Name + "="

var returnvalue = "";

if (document.cookie.length > 0) {

offset = document.cookie.indexOf(search)

if (offset != -1) { 

offset += search.length

end = document.cookie.indexOf(";", offset);

if (end == -1) end = document.cookie.length;

returnvalue=unescape(document.cookie.substring(offset, end))

}

}

return returnvalue;

}



function onloadfunction(){

if (persistmenu=="yes"){

var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname

var cookievalue=get_cookie(cookiename)

if (cookievalue!="")

document.getElementById(cookievalue).style.display="block"

}

}



function savemenustate(){

var inc=1, blockid=""

while (document.getElementById("sub"+inc)){

if (document.getElementById("sub"+inc).style.display=="block"){

blockid="sub"+inc

break

}

inc++

}

var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname

var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid

document.cookie=cookiename+"="+cookievalue

}



if (window.addEventListener)

window.addEventListener("load", onloadfunction, false)

else if (window.attachEvent)

window.attachEvent("onload", onloadfunction)

else if (document.getElementById)

window.onload=onloadfunction



if (persistmenu=="yes" && document.getElementById)

window.onunload=savemenustate




