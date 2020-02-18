		var priv;
		var now = '1';	
		/*var nav = [];
		nav[0] = "1";
		for (i=1; i<8; i++){
			nav[i] = "0";
		}
		*/
		//var text = document.getElementById(now).innerHTML;
		//alert(text);
		function active(id){
			if (now != id){
				priv = now;
				now = id;
				//alert(priv);
				//alert(now);
				document.getElementById(now).className = "active";
				document.getElementById(priv).className = "non-active";
				var text = document.getElementById(now).innerHTML;
				var title = document.getElementById("title").innerHTML;
				document.getElementById("link").innerHTML = "<a style = \"text-decoration: none;\" href=\"MainPage.php\">Home</a>" + " -> "+title+" -> "+text;
			}
		}
		function change(b,s){
			if (document.getElementById(b).value == "show"){
				document.getElementById(b).value = "hide";
				document.getElementById(s).style.display = 'block';
			}
			else{
				document.getElementById(b).value = "show";
				document.getElementById(s).style.display = 'none';
			}
		}
		function show(id){
			document.getElementById(id).style.display = 'block';
		}