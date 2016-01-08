<?php
header('Content-type: text/css');
$c = $_REQUEST['c'];
$buttonCount = (int)$_REQUEST['buttoncount'];
echo ".subs{
	background-color:#F4F4F4;
	margin-top: 20px;
	-mos-border-radius: 6px;
	border-radius: 6px;
}

.subs td {
	padding: 5px 5px 5px 15px;
	vertical-align: top;
	border-right: 1px solid #e9e9e9;
	border-top: 1px solid #e9e9e9;
}

.subs td:last-child {
	border-right: 0;
}

.subs tr.headings{
	background: -moz-linear-gradient(center top , #F3F3F3, #D7D7D7) repeat scroll 0 0 #E7E7E7;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#D7D7D7', endColorstr='#F3F3F3'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#F3F3F3),
		to(#D7D7D7) );
}

.subs tr.headings td.bestvalue{
	background: -moz-linear-gradient(center top , #F2A9FA, #CB8ED1) repeat scroll 0 0 #F2A9FA;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#CB8ED1', endColorstr='#F2A9FA'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#F2A9FA),
		to(#CB8ED1) );

}

#subscription-container .headings h2{
	font-size:1.3em;
	margin:5px 5px 5px 0;
	padding:0;

}
#subscription-container .headings h3{
	font-size:1.1em;
	color:#666;
	margin:5px 5px 5px 0;
	padding:0;
}

.strapline{
	color:#777;
	font-size:0.8em;
}

.bestvalue,
.subs tfoot td.bestvalue,
.subs thead td.bestvalue{
	background:#FEB0FB;
	background:#F2A9FA;
	background:#F4B9F9;
}

#subscription-container .headings .bestvalue h3,
#subscription-container .headings .bestvalue .strapline {
	color:#000;
}
#subscription-container .headings .bestvalue h2{
	color:#fff;
}

.subs td.bestvalue {
	border-top: 1px solid #F0A0F0;
	border-top: 1px solid #DFA9E3;
}

.signup td{
	text-align:center;
	padding:0;
}


.faqs h4{
	color:#666;
}

.subs i.icon-ok,
.subs i.icon-time {
	color: green;
}

/*** subs footer ***/

.subs tfoot td,
.subs thead td{
	background:#fff;
	border-color:#fff;
}

.subs tfoot td.bestvalue{
	border-radius: 0 0 6px 6px;
}
.subs thead td.bestvalue{
	border-radius: 6px 6px 0 0;
	border-top:0px;
}


/** bottom content **/

.moreinfo {
	display: table;
	margin-top: 20px;
}

/** faqs **/

.faqs {
	margin-top: 20px;
	display: table-cell;
}

.faq {
	padding-bottom: 15px;
	padding-right: 20px;
}

.notes {
	margin: 10px 0;
}

/** testimonials **/

.testimonials blockquote p {
	background-color: #FAFAE6;
	border: 1px solid #E8E6AB;
	border-radius: 5px 5px 5px 5px;
	padding: 6px;
	quotes: none;
}

.testimonials blockquote .author {
	text-align: right;
	color: 666;
	margin: 7px 0 30px;
	font-style: italic;
}

.testimonials {
	display: table-cell;
}

.testimonials h3 {
	margin-bottom: 23px;
}";
?>