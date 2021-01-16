// Récupération des sources de trafic - script à ajouter sur toutes les pages

// Librairie JS cookie
!function(e){var n=!1;if("function"==typeof define&&define.amd&&(define(e),n=!0),"object"==typeof exports&&(module.exports=e(),n=!0),!n){var o=window.Cookies,t=window.Cookies=e();t.noConflict=function(){return window.Cookies=o,t}}}(function(){function e(){for(var e=0,n={};e<arguments.length;e++){var o=arguments[e];for(var t in o)n[t]=o[t]}return n}function n(o){function t(n,r,i){var c;if("undefined"!=typeof document){if(arguments.length>1){if("number"==typeof(i=e({path:"/"},t.defaults,i)).expires){var a=new Date;a.setMilliseconds(a.getMilliseconds()+864e5*i.expires),i.expires=a}i.expires=i.expires?i.expires.toUTCString():"";try{c=JSON.stringify(r),/^[\{\[]/.test(c)&&(r=c)}catch(e){}r=o.write?o.write(r,n):encodeURIComponent(String(r)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),n=(n=(n=encodeURIComponent(String(n))).replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent)).replace(/[\(\)]/g,escape);var s="";for(var f in i)i[f]&&(s+="; "+f,!0!==i[f]&&(s+="="+i[f]));return document.cookie=n+"="+r+s}n||(c={});for(var p=document.cookie?document.cookie.split("; "):[],d=/(%[0-9A-Z]{2})+/g,u=0;u<p.length;u++){var l=p[u].split("="),C=l.slice(1).join("=");this.json||'"'!==C.charAt(0)||(C=C.slice(1,-1));try{var g=l[0].replace(d,decodeURIComponent);if(C=o.read?o.read(C,g):o(C,g)||C.replace(d,decodeURIComponent),this.json)try{C=JSON.parse(C)}catch(e){}if(n===g){c=C;break}n||(c[g]=C)}catch(e){}}return c}}return t.set=t,t.get=function(e){return t.call(t,e)},t.getJSON=function(){return t.apply({json:!0},[].slice.call(arguments))},t.defaults={},t.remove=function(n,o){t(n,"",e(o,{expires:-1}))},t.withConverter=n,t}return n(function(){})});


// récupère le cookie actuel (s'il existe)
var want_cookie = Cookies.get('cookie_crunch');

	// Récupère les paramètres de l'url 
		function getParameter(theParameter) {
			var params = window.location.search.substr(1).split('&');
			for (var i = 0; i < params.length; i++) {
				var p=params[i].split('=');
				if (p[0] == theParameter) {
					return decodeURIComponent(p[1]);
				}
			}
			return false;
		}
		var url_src = getParameter('utm_source'),
		url_mdm = getParameter('utm_medium'),
		url_cpn = getParameter('utm_campaign');

		current_url = window.location.hostname;
		var parser = document.createElement('a');
		parser.href = document.referrer;
		var url_referal = parser.hostname;
		// si l'url referal est diférent de l'url actuelle
		if(current_url!= url_referal){
			var url_rfr = url_referal;
		}
		
		 
	// paramètre le cookie
		var pepites = new Object();
		var pate_cookie = Cookies.get('cookie_utms');

		// si on a au moins un utm et le cookie n'existe pas
		if((url_src!== false || url_mdm!==false || url_cpn!==false || url_rfr!=='undefined') && (pate_cookie == null || pate_cookie == "" )) {
			if(url_src!== false){ 
				pepites["source"] = url_src; 
			}
			if(url_mdm!==false){
				pepites["medium"] = url_mdm; 
			}
			if (url_cpn!==false) {
				pepites["campaign"] = url_cpn;
			}
			if (url_rfr!==undefined ) {
				pepites["referal"] = url_rfr;
			}
			Cookies.set('cookie_utms', pepites, { expires: 120 } );
		}
		
		// sinon si on a au moins un utm et le cookie existe
		else if((url_src!== false || url_mdm!==false || url_cpn!==false || url_rfr!=='undefined') && (pate_cookie != null || pate_cookie != "")) {
			pate_cookie_choco = JSON.parse(pate_cookie);
			
			// cas ou le cookie existe dÃ©jÃ 
			if(pate_cookie_choco["source"] != undefined) {
				//si l'utm source existe et n'est pas enregistrÃ© parmi les sources du cookie
				if(url_src!== false && pate_cookie_choco["source"].indexOf(url_src) != -1 ){
					pepites["source"] = pate_cookie_choco["source"]; 
				}
				//si l'utm source existe, on l'ajoute aux sources du cookie
				else if(url_src!== false){
				pepites["source"] = pate_cookie_choco["source"]+"-"+url_src; 
				}
				//si l'utm source n'existe, on rÃ©cupÃ¨re les donnÃ©es du cookie
				else if ( url_src == false && pate_cookie_choco["source"] != undefined) { 
				pepites["source"] = pate_cookie_choco["source"]; 
				}
			}
			// cas ou le cookie n'existe pas encore			
			else if ( url_src!== false ) { 
					pepites["source"] = url_src; 
			}

			if(pate_cookie_choco["medium"] != undefined) {
				if(url_mdm!== false && pate_cookie_choco["medium"].indexOf(url_mdm) != -1 ){
					pepites["medium"] = pate_cookie_choco["medium"];
				}
				else if(url_mdm!== false ) { 
				pepites["medium"] = pate_cookie_choco["medium"]+"-"+url_mdm; 
				}
				else if(url_mdm == false){
				pepites["medium"] = pate_cookie_choco["medium"]; 
				}
			}
			else if(url_mdm!== false){
				pepites["medium"] = url_mdm; 
			}
			
			if(pate_cookie_choco["campaign"] != undefined) {
				if(url_cpn!== false && pate_cookie_choco["campaign"].indexOf(url_cpn) != -1 ){
					pepites["campaign"] = pate_cookie_choco["campaign"];
				}
				else if(url_cpn!== false) { 
				pepites["campaign"] = pate_cookie_choco["campaign"]+"-"+url_cpn; 
				}  
				else if(url_cpn == false){
					pepites["campaign"] = pate_cookie_choco["campaign"]; 
				} 
			}
			else if(url_cpn!== false){
				pepites["campaign"] = url_cpn; 
			}
			if(pate_cookie_choco["referal"] != undefined) {
				if(url_rfr!== 'undefined' && pate_cookie_choco["referal"].indexOf(url_rfr) != -1 ){
					pepites["referal"] = pate_cookie_choco["referal"];
				}
				// don't register referer if it's equal to the current domain
				else if(url_rfr!== undefined) { 
				pepites["referal"] = pate_cookie_choco["referal"]+"-"+url_rfr; 
				}  
				else if(url_rfr == undefined){
					pepites["referal"] = pate_cookie_choco["referal"]; 
				} 
			}
			else if(url_rfr!==undefined){
				pepites["referal"] = url_rfr; 
			}
			Cookies.set('cookie_utms', pepites, { expires: 120 } );
		}
	
// récupération des paramètres du cookie
if (document.getElementById('mobicheckin-form')) {
	var iframe_url = document.getElementById('mobicheckin-form').getAttribute('src')
	var cookie = Cookies.get('cookie_utms');
	if (cookie != undefined){
		var cookie_choco = JSON.parse(cookie);
		var cookie_referal = cookie_choco["referal"];
		var cookie_src = cookie_choco["source"];
		var cookie_mdm = cookie_choco["medium"];
		var cookie_cpn = cookie_choco["campaign"];
		var cookie_rfr = cookie_choco["referal"];
		
		// ajout les paramètres du cookie dans les formulaires
		if(document.getElementById('dr-source')) {
			this.setAttribute('value', cookie_src);
		}
		if(document.getElementById('dr-medium')) {
			this.setAttribute('value', cookie_mdm);
		}
		if(document.getElementById('dr-source')) {
			this.setAttribute('value', cookie_cpn);
		}
		if(document.getElementById('dr-source')) {
			this.setAttribute('value', cookie_rfr);
		}
	}
}
