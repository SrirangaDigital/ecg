//Month Pop Up script

var timer;
var YearName;
function PushUp(id)
{

switch(id)
{
case '1':
  PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '2':
  PushDown('1');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '3':
  PushDown('1');PushDown('2');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '4':
  PushDown('1');PushDown('2');PushDown('3');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '5':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '6':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '7':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '8':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');
  PushDown('9');PushDown('10');PushDown('11');PushDown('12');
  break;
case '9':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('10');PushDown('11');PushDown('12');
  break;
case '10':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('11');PushDown('12');
  break;
case '11':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('12');
  break;
case '12':
  PushDown('1');PushDown('2');PushDown('3');PushDown('4');
  PushDown('5');PushDown('6');PushDown('7');PushDown('8');
  PushDown('9');PushDown('10');PushDown('11');
  break;
case '21':
  PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '22':
  PushDown('21');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '23':
  PushDown('21');PushDown('22');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '24':
  PushDown('21');PushDown('22');PushDown('23');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '25':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '26':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '27':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '28':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');
  PushDown('29');PushDown('210');PushDown('211');PushDown('212');
  break;
case '29':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('210');PushDown('211');PushDown('212');
  break;
case '210':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('211');PushDown('212');
  break;
case '211':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('212');
  break;
case '212':
  PushDown('21');PushDown('22');PushDown('23');PushDown('24');
  PushDown('25');PushDown('26');PushDown('27');PushDown('28');
  PushDown('29');PushDown('210');PushDown('211');
  break;
case '35':	
  PushDown('36');PushDown('37');PushDown('38');
  PushDown('39');PushDown('310');PushDown('311');PushDown('312');
  break;
case '36':
  PushDown('35');PushDown('37');PushDown('38');
  PushDown('39');PushDown('310');PushDown('311');PushDown('312');
  break;
case '37':
  PushDown('35');PushDown('36');PushDown('38');
  PushDown('39');PushDown('310');PushDown('311');PushDown('312');
  break;
case '38':
  PushDown('35');PushDown('36');PushDown('37');
  PushDown('39');PushDown('310');PushDown('311');PushDown('312');
  break;
case '39':
  PushDown('35');PushDown('36');PushDown('37');PushDown('38');
  PushDown('310');PushDown('311');PushDown('312');
  break;
case '310':
  PushDown('35');PushDown('36');PushDown('37');PushDown('38');
  PushDown('39');PushDown('311');PushDown('312');
  break;
case '311':
  PushDown('35');PushDown('36');PushDown('37');PushDown('38');
  PushDown('39');PushDown('310');PushDown('312');
  break;
case '312':
  PushDown('35');PushDown('36');PushDown('37');PushDown('38');
  PushDown('39');PushDown('310');PushDown('311');
  break;

default:
  break;
}
var id1="image" + id;
if (timer) clearTimeout(timer);

var divObj = document.getElementById(id1);

if (parseInt(divObj.style.paddingBottom) < 30)
{
	divObj.style.paddingBottom = parseInt(divObj.style.paddingBottom) + 3 + "px";
	timer = setTimeout('PushUp("'+id+'")',10);
}

}

function PushDown(id)
{

var id2="image" + id;

if (timer) clearTimeout(timer);

var divObj = document.getElementById(id2);

if (parseInt(divObj.style.paddingBottom) > 0)
{
	divObj.style.paddingBottom = parseInt(divObj.style.paddingBottom) - 3 + "px";
	timer = setTimeout('PushDown("'+id+'")',10);
}

}


function showpopup1(yr1)
{

YearName=yr1;

$('#total').css({"opacity":"0.66","z-index":"500"});

var width=$(window).width();
var height=$(document).height();





var popuptop=(($(window).height())/2)-(($("#popup1").height())/2);
var popupleft=(($(window).width())/2)-(($("#popup1").width())/2);

$('#popup1').css({"top":popuptop,"left":popupleft,"z-index":"1000"});

$('#total').fadeIn(300, function ()
						{
							$('#yearname1').fadeIn(300, function()
													{
														$('#popup1').fadeIn(300 , function()
																						{
																							$('#closebutton1').fadeIn(300);
																						})
													})
						});
						
var y31=$('#yearname1').html();
y31 = "<span class='yeartitle1'>" + YearName + "</span>";
$('#yearname1').html(y31);

var m1=$('#popup1disp').html();
m1 = "<td id=\"popup1disp\" class=\"racktop\" valign=\"bottom\" height=\"220\" style=\"padding-bottom: 18px;\">" +
"<a href=\"year_" + YearName + "_1.html\"><img id=\"image1\" src=\"images/book1.png\" style=\"padding-left: 25px;vertical-align: bottom; border: none; margin: 0 0 0 0\" border=\"0\" onMouseOver=\"document.getElementById('image1').style.paddingBottom='0px';PushUp('1');\" onmouseout=\"PushDown('1')\"/></a>" + 
"<a href=\"year_" + YearName + "_2.html\"><img id=\"image2\" src=\"images/book2.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image2').style.paddingBottom='0px';PushUp('2');\" onmouseout=\"PushDown('2')\"/></a>" + 
"<a href=\"year_" + YearName + "_3.html\"><img id=\"image3\" src=\"images/book3.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image3').style.paddingBottom='0px';PushUp('3');\" onmouseout=\"PushDown('3')\"/></a>" +
"<a href=\"year_" + YearName + "_4.html\"><img id=\"image4\" src=\"images/book4.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image4').style.paddingBottom='0px';PushUp('4');\" onmouseout=\"PushDown('4')\"/></a>" +
"<a href=\"year_" + YearName + "_5.html\"><img id=\"image5\" src=\"images/book5.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image5').style.paddingBottom='0px';PushUp('5');\" onmouseout=\"PushDown('5')\"/></a>" +
"<a href=\"year_" + YearName + "_6.html\"><img id=\"image6\" src=\"images/book6.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image6').style.paddingBottom='0px';PushUp('6');\" onmouseout=\"PushDown('6')\"/></a>" +
"<a href=\"year_" + YearName + "_7.html\"><img id=\"image7\" src=\"images/book7.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image7').style.paddingBottom='0px';PushUp('7');\" onmouseout=\"PushDown('7')\"/></a>" +
"<a href=\"year_" + YearName + "_8.html\"><img id=\"image8\" src=\"images/book8.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image8').style.paddingBottom='0px';PushUp('8');\" onmouseout=\"PushDown('8')\"/></a>" +
"<a href=\"year_" + YearName + "_9.html\"><img id=\"image9\" src=\"images/book9.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image9').style.paddingBottom='0px';PushUp('9');\" onmouseout=\"PushDown('9')\"/></a>" +
"<a href=\"year_" + YearName + "_10.html\"><img id=\"image10\" src=\"images/book10.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image10').style.paddingBottom='0px';PushUp('10');\" onmouseout=\"PushDown('10')\"/></a>" +
"<a href=\"year_" + YearName + "_11.html\"><img id=\"image11\" src=\"images/book11.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image11').style.paddingBottom='0px';PushUp('11');\" onmouseout=\"PushDown('11')\"/></a>" +
"<a href=\"year_" + YearName + "_12.html\"><img id=\"image12\" src=\"images/book12.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image12').style.paddingBottom='0px';PushUp('12');\" onmouseout=\"PushDown('12')\"/></a>" +
"</td>";
$('#popup1disp').html(m1);
}


function showpopup2(yr2)
{

YearName=yr2;

$('#total').css({"opacity":"0.66","z-index":"500"});

var width=$(window).width();
var height=$(document).height();





var popuptop=(($(window).height())/2)-(($("#popup2").height())/2);
var popupleft=(($(window).width())/2)-(($("#popup2").width())/2);

$('#popup2').css({"top":popuptop,"left":popupleft,"z-index":"1000"});

$('#total').fadeIn(300, function ()
						{
							$('#yearname2').fadeIn(300, function()
													{
														$('#popup2').fadeIn(300 , function()
																						{
																							$('#closebutton2').fadeIn(300);
																						})
													})
						});
						
var y31=$('#yearname2').html();
y31 = "<span class='yeartitle1'>" + YearName + "</span>";
$('#yearname2').html(y31);

var m2=$('#popup2disp').html();
m2 = "<td id=\"popup2disp\" class=\"racktop\" valign=\"bottom\" height=\"220\" style=\"padding-bottom: 18px;\">" +
"<a href=\"year_" + YearName + "_5.html\"><img id=\"image25\" src=\"images/book5.png\" style=\"padding-left: 25px;vertical-align: bottom; border: none; margin: 0 0 0 0\" border=\"0\" onMouseOver=\"document.getElementById('image25').style.paddingBottom='0px';PushUp('25');\" onmouseout=\"PushDown('25')\"/></a>" +
"<a href=\"year_" + YearName + "_6.html\"><img id=\"image26\" src=\"images/book6.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image26').style.paddingBottom='0px';PushUp('26');\" onmouseout=\"PushDown('26')\"/></a>" +
"<a href=\"year_" + YearName + "_7.html\"><img id=\"image27\" src=\"images/book7.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image27').style.paddingBottom='0px';PushUp('27');\" onmouseout=\"PushDown('27')\"/></a>" +
"<a href=\"year_" + YearName + "_8.html\"><img id=\"image28\" src=\"images/book8.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image28').style.paddingBottom='0px';PushUp('28');\" onmouseout=\"PushDown('28')\"/></a>" +
"<a href=\"year_" + YearName + "_9.html\"><img id=\"image29\" src=\"images/book9.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image29').style.paddingBottom='0px';PushUp('29');\" onmouseout=\"PushDown('29')\"/></a>" +
"<a href=\"year_" + YearName + "_10.html\"><img id=\"image210\" src=\"images/book10.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image210').style.paddingBottom='0px';PushUp('210');\" onmouseout=\"PushDown('210')\"/></a>" +
"<a href=\"year_" + YearName + "_11.html\"><img id=\"image211\" src=\"images/book11.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image211').style.paddingBottom='0px';PushUp('211');\" onmouseout=\"PushDown('211')\"/></a>" +
"<a href=\"year_" + YearName + "_12.html\"><img id=\"image212\" src=\"images/book12.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image212').style.paddingBottom='0px';PushUp('212');\" onmouseout=\"PushDown('212')\"/></a>" +
"<a href=\"year_" + YearName + "_1.html\"><img id=\"image21\" src=\"images/book1.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image21').style.paddingBottom='0px';PushUp('21');\" onmouseout=\"PushDown('21')\"/></a>" + 
"<a href=\"year_" + YearName + "_2.html\"><img id=\"image22\" src=\"images/book2.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image22').style.paddingBottom='0px';PushUp('22');\" onmouseout=\"PushDown('22')\"/></a>" + 
"<a href=\"year_" + YearName + "_3.html\"><img id=\"image23\" src=\"images/book3.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image23').style.paddingBottom='0px';PushUp('23');\" onmouseout=\"PushDown('23')\"/></a>" +
"<a href=\"year_" + YearName + "_4.html\"><img id=\"image24\" src=\"images/book4.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image24').style.paddingBottom='0px';PushUp('24');\" onmouseout=\"PushDown('24')\"/></a>" +
"</td>";
$('#popup2disp').html(m2);
}


function showpopup3(yr3)
{

YearName=yr3;

$('#total').css({"opacity":"0.66","z-index":"500"});

var width=$(window).width();
var height=$(document).height();


var popuptop=(($(window).height())/2)-(($("#popup3").height())/2);
var popupleft=(($(window).width())/2)-(($("#popup3").width())/2);

$('#popup3').css({"top":popuptop,"left":popupleft,"z-index":"1000"});

$('#total').fadeIn(300, function ()
						{
							$('#yearname3').fadeIn(300, function()
													{
														$('#popup3').fadeIn(300 , function()
																						{
																							$('#closebutton3').fadeIn(300);
																						})
													})
						});
						
var y3=$('#yearname3').html();
y3 = "<span class='yeartitle1'>" + YearName + "</span>";
$('#yearname3').html(y3);

var m3=$('#popup3disp').html();
m3 = "<td id=\"popup3disp\" class=\"racktop\" valign=\"bottom\" height=\"220\" style=\"padding-bottom: 18px;\">" +
"<a href=\"year_" + YearName + "_5.html\"><img id=\"image35\" src=\"images/book5.png\" style=\"padding-left: 25px;vertical-align: bottom; border: none; margin: 0 0 0 0\" border=\"0\" onMouseOver=\"document.getElementById('image35').style.paddingBottom='0px';PushUp('35');\" onmouseout=\"PushDown('35')\"/></a>" +
"<a href=\"year_" + YearName + "_6.html\"><img id=\"image36\" src=\"images/book6.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image36').style.paddingBottom='0px';PushUp('36');\" onmouseout=\"PushDown('36')\"/></a>" +
"<a href=\"year_" + YearName + "_7.html\"><img id=\"image37\" src=\"images/book7.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image37').style.paddingBottom='0px';PushUp('37');\" onmouseout=\"PushDown('37')\"/></a>" +
"<a href=\"year_" + YearName + "_8.html\"><img id=\"image38\" src=\"images/book8.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image38').style.paddingBottom='0px';PushUp('38');\" onmouseout=\"PushDown('38')\"/></a>" +
"<a href=\"year_" + YearName + "_9.html\"><img id=\"image39\" src=\"images/book9.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image39').style.paddingBottom='0px';PushUp('39');\" onmouseout=\"PushDown('39')\"/></a>" +
"<a href=\"year_" + YearName + "_10.html\"><img id=\"image310\" src=\"images/book10.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image310').style.paddingBottom='0px';PushUp('310');\" onmouseout=\"PushDown('310')\"/></a>" +
"<a href=\"year_" + YearName + "_11.html\"><img id=\"image311\" src=\"images/book11.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image311').style.paddingBottom='0px';PushUp('311');\" onmouseout=\"PushDown('311')\"/></a>" +
"<a href=\"year_" + YearName + "_12.html\"><img id=\"image312\" src=\"images/book12.png\" class=\"monthimage\" border=\"0\" onMouseOver=\"document.getElementById('image312').style.paddingBottom='0px';PushUp('312');\" onmouseout=\"PushDown('312')\"/></a>" +
"</td>";
$('#popup3disp').html(m3);
}


function closepopup(id1, id2, id3, id4)
{
$(id1).fadeOut(300, function ()
						{
							$(id2).fadeOut(300, function()
													{
														$(id3).fadeOut(300 , function()
																						{
																							$(id4).fadeOut(300);
																						})
													})
						});
}
