function style(){
	var menu = document.getElementById("menu");
	var ul = document.createElement("ul");
	var style = document.getElementsByTagName("head")[0].getElementsByTagName("link");
	for (let i=0; i<style.length; i++){
		var li= document.createElement("li");
		var href= document.createElement("a");
		href.innerHTML= style[i].title;
		href.setAttribute("onclick", "SetStyle(\""+style[i].title+"\")");
		li.appendChild(href);
		ul.appendChild(li);
	}
	menu.appendChild(ul);
}

function SetStyle(styleName) {
	let styles = document.getElementsByTagName("head")[0].getElementsByTagName("link");
	for (let i = 0 ; i < styles.length ; i++) {
	   let style = styles[i];
		style.disabled = true;
		if(style.title==styleName) style.disabled = false;
	}
   setCookie("styles",styleName,365);
 }

 function setCookie(nazwa, style, dni) {
	let data = new Date();
	data.setTime(data.getTime() + (dni * 24 * 60 * 60 * 1000));
	let wygasa = "expires=" + data.toUTCString();
	document.cookie = nazwa + "=" + style + ";" + wygasa + "; path=/";
  }
 
 function checkCookie() {
	let cookie = wczytajCookie("styles");
	if(cookie!="")SetStyle(cookie);
 }

  function wczytajCookie(nazwa) {
	let style = "";
	nazwa = nazwa + "=";
	let cookies = decodeURIComponent(document.cookie).split(';');
	for (let i = 0 ; i < cookies.length ; i++) {
	   let cookie = cookies[i];
	   while (cookie.charAt(0) == ' ') {
		  cookie = cookie.substring(1);
	   }
	   if (cookie.indexOf(nazwa) == 0) {
		  style = cookie.substring(nazwa.length, cookie.length);
		  break;
	   }
	}
	return style;
 }
