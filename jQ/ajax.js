


function getXMLHttpRequest(){
    try {
        return new XMLHttpRequest();
    }catch(e){
    	try {
			return new ActiveXObject("Msxml3.XMLHTTP");
    	}catch(e){    	
    		try {
        		return new ActiveXObject("Msxml2.XMLHTTP.6.0");
    		}catch(e){
    			try {
        			return new ActiveXObject("Msxml2.XMLHTTP.3.0");
    			}catch(e){
				    try {
        				return new ActiveXObject("Msxml2.XMLHTTP");
    				}catch(e){
    				   try {
        					return new ActiveXObject("Microsoft.XMLHTTP");
    					}catch(e){
    						return null;
    					}
    				}    			
    			}
    		}
    	}
	}
}


function sendRequestGet( idTarget, url ) {
	if (url.length == 0) {
		return ("");
	} else {
		var httpRequest = getXMLHttpRequest();
		if (httpRequest != null){
			httpRequest.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById( idTarget ).innerHTML =this.responseText ;
				return(null);
				}
			};
			httpRequest.open( "GET", url, true );
			httpRequest.send();
		} 
	}
}


function sendRequestPost( idTarget, url, formId ) {
	if (url.length == 0) {
		return ("");
	} else {
		var formData = new FormData(document.getElementById(formId));
		var httpRequest = getXMLHttpRequest();
		if (httpRequest != null){
			httpRequest.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById( idTarget ).innerHTML =this.responseText;
			}
		};
		httpRequest.open("POST", url, true);
		httpRequest.data(formData);
		httpRequest.send();
		} 
	}
}
	
	