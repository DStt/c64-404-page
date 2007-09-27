<?

	$pageurl = $_SERVER[REDIRECT_URL];
	if ($_SERVER[REDIRECT_QUERY_STRING]) {
		$pageurl .= "?" . $_SERVER[REDIRECT_QUERY_STRING];
	}

	if (preg_match("/\/site2\//",$pageurl)) {
		header("Location:http://www.xklub.dk"); 
		exit;
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<link rel="stylesheet" href="/404/c64charset.css" type="text/css" media="screen" />
<style>
	* { margin:0px;padding:0px; }
	/* body { background:#7b73de url(/404/c64.gif) no-repeat center 50px scroll; } */
	body { background:#7b73de }

	
	#c64background { height:400px; width:640px; background:#3931a5; }
	.cont { text-align:left;margin-top:168px;width:640px; color:#7b73de; font-family: verdana; font-size:24px; font-weight:bold;}
	#ursor { position:relative; top:-0px; left:-3px; color:#7b73de;background:#7b73de;width:20px;height:21px; font-size:1px;display:block}
	#cursor { position:absolute; top:168px; color:#7b73de;background:#7b73de;width:16px;height:16px; font-size:1px;display:block}
	kbd { float:left;displa:none; }
</style>

<script language="JavaScript">


	// c64 404 page not found by Klaus Hessellund / 200709
	// Feel free to copy this script to you own page. Some credits would be nice, but not mandatory :p
	// c64 charset found here : http://www.dwarffortresswiki.net/index.php/List_of_user_tilesets



	var text;
	text = "� \n";
	text += "    **** COMMODORE 64 BASIC V2 ****\n \n";
	text += " 64K RAM SYSTEM  38911 BASIC BYTES FREE\n \n";
	text += "READY.\n";
	text += "��LOAD\"<?=$pageurl?>\",8�\n" + 
	       "SEARCHING FOR <?=$pageurl?>�\n" +
	       "?FILE NOT FOUND  ERROR\nREADY.\n� \n�Fuck! What do I do?�\n" +
	       "?SYNTAX ERROR\n" + 
	       "READY.\n" + 
				 "������Still here? I must be insane.�\n" +
				 "?YEAH.. GET LOST!\n" +
				 "READY.\n" +
	       "��Ok...�......�\n" +
				 "!THANK YOU\n" + 
				 "READY.\n" + 
				 "��������������������������THE END" + 
				 "" + 
				 ""; 

	var textlen = text.length;
	var textidx=0;
  var fontwidth=16;
	var typing=1;
	var pause=0;

	function parsechar (c) {
		movecursor=1;
		if (c == ' ') { c='space'; }
		else if (c == '�') { c='OE'; }
		else if (c == '�') { c='AA'; }
		else if (c == '.') { c='dot'; }
		else if (c == '*') { c='star'; }
		else if (c == '/') { c='slash'; }
		else if (c == '"') { c='quot'; }
		else if ((c>0 && c<=9)) { c='n'+c; }
		else if ((c== '0')) { c='n'+c; }
		else if (c == ',') { c='comma'; }
		else if (c == '!') { c='att'; }
		else if (c == '?') { c='question'; }
		else if (c == '_') { c='underscore'; }
		else if (c == '\n') { c='newline'; movecursor=0; }
		else if (c == '�') { c='none'; typing = 0; movecursor=0; }
		else if (c == '�') { c='none'; typing = 1; movecursor=0; }
		else if (c == '�') { c='none'; pause = 1; movecursor=0; }

		return (c);
	}

	var t;
	var c;
	var b;
	var isie = $.browser.msie ? 1 :0;

	function writetext() {

		var getchar = text.charAt(textidx);
		c64char = '<div id="i' + textidx + '" class="' + parsechar(getchar) + '"></div>';
		t.innerHTML = t.innerHTML + c64char;
		
		var elid='i' + textidx;
		var el = document.getElementById(elid);
		var addwidth = movecursor ? fontwidth : 0 ;
		var curleft = el.offsetLeft +addwidth;;
		var curtop = el.offsetTop;
		if (curleft > 1000) { alert (curleft); }


		if (textlen != textidx) {
			textidx++;
			// $('#cursor').css("top",curtop);
			// $('#cursor').css("left",curleft + 'px');
			// document.getElementById('cursor').style.top = curtop + 'px';
			// document.getElementById('cursor').style.left = curleft + 'px';
			c.style.top = curtop + 'px';
			c.style.left = curleft + 'px';
			
			if (typing) {
				if (randx(10) > 7) {
					rand=randx(500);
				} else {
					rand=randx(200);
				}
				fixedrand=10;
			} else {
				rand=0;
				fixedrand=0;
			}
			if (pause) {
				rand=2000; pause=0; 
			} else {
				flipcursor(1);
			}

			if (rand==0) {
				writetext();
			} else {
    		setTimeout ('writetext()',fixedrand+rand);
			}

		} else {

		}
	}

	function flipcursor(nosettime) {

		var cursor=document.getElementById("cursor");

		if (cursor.style.visibility == 'hidden') {
			cursor.style.visibility = '';
		} else {
			cursor.style.visibility = 'hidden';
		}
		if (!nosettime) {
			setTimeout('flipcursor()',200);
		}
	}

	function randx(n) {
 		return ( Math.floor ( Math.random ( ) * n + 1 ) );
	}

	function initWrite () {
		t = document.getElementById("thetext");
		c = document.getElementById("cursor");
		b = document.getElementById("body");
		writetext();
		// flipbackground();
	}

	var bgflipped = 1;
	function flipbackground() {
		bgflipped ? b.style.background="white" : b.style.background="black";
		bgflipped = bgflipped ? 0 : 1;
		setTimeout('flipbackground()',0);
	}


</script>


</head>

<body id="body" onload="flipcursor(0);initWrite();">


<center>

<div style="height:100px">&nbsp;<br><br><br></div>
<div id="c64background">

	<div id="thetext">
	</div>
	<div id="cursor">&nbsp;</div>

</div>


</center>


</body>


</html>
