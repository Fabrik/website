<?php
header('Content-type: text/css');
$c = $_REQUEST['c'];
$buttonCount = (int) $_REQUEST['buttoncount'];
$buttonTotal = $buttonCount === 0 ? '100%' : 30 * $buttonCount ."px";
echo "

#listform_$c table{
width: 100%;
}

#listform_$c ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

#listform_$c .groupdataMsg{
padding: 0;
}

#listform_$c td{
	border: 0 !important;
}

#listform_$c .oddRow0,
#listform_$c .oddRow1  {
	background-color: #fff;
}

.toggleImg {
display: inline-block; float: left; line-height: 2em; padding-top: 8px;
margin-right: 8px;
}

.fabrik-filetype-swf{
	background: url(\"../../../../../../media/com_fabrik/images/flash.jpg\") no-repeat scroll 0 0 transparent;
    display: block;
    height: 75px;
    text-indent: -9000px;
    width: 75px;
}

table.fabrikList .fabrik_groupheading td {
border-bottom: 0;
}
";?>