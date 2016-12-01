<?php

// Header file will use this to set the page title
$PageTitle="Enter Item Type";

// Header file will use this function to link your page to other css or js files


// Header
include_once('./templates/header.php');
?>
<html>
<head>
<script type="text/javascript">
function validateData()
{
validateItem();
validateBarcode();
validateUnit();
validateReorderPoint();
validateValidityDays();
}
 function validateItem(){
var itn = document.getElementById("itname").value;
if(itn.length<1)
{
	alert("Item Type Name is a required field");
}
//else if (!/^[a-zA-Z0-9][a-zA-Z0-9 .]*$/.test(itn)){

 //alert("Item Type Name can not start with a 0, can contain letters and digits from 0-9");
	//}
	}
    function validateBarcode(){
	var barc = document.getElementById("bar").value;
	if(barc.length<1)
{
	alert("Barcode Prefix is a required field");
}
	//else if (!/^[0-9]{4}$/.test(barc)){
	//alert("Barcodes Prefix must be exactly 4 digits long");
		//}
		}
	function validateUnit(){
	var unit = document.getElementById("unit").value;
	if(unit.length<1)
{
	alert("Unit is a required field");
}
	//else if (!/^[1-9][0-9]*$/.test(unit)){
     //alert("Unit can't start with a 0, it must only contain digits from 0-9");
		//}
		}
	function validateReorderPoint(){
	var reorder = document.getElementById("reorder").value;
	if(reorder.length<1)
{
	alert("reorder is a required field");
}
	//else if (!/^[1-9][0-9]*.[0-9]{2}$/.test(reorder)){
      //alert("Reorder Point should not being with a 0, only contain digits from 0-9 and should not begin with a 0");
		//}
		}
	function validateValidityDays(){
		var validv = document.getElementById("valid").value;
		if(validv.length<1)
{
	alert("Validity Days is a required field");
}
		//else if (/^[1-9][0-9]*$/.test(validv)||/^-1$/.test(validv)){
        //    ;
		//}
		//else
		//alert("Validity Days must contain digits 0-9, should not begin with a 0, or could just contain the string -1");
	}
</script>
</head>
<body bgcolor = "00BFFF">
<form method="POST" action="dbenterItemType.php" name="enterItemType" onsubmit="return validate()" >
<div align="center">
<table cellpadding ="10">

<th colspan = "4"><h2>ADD AN INVENTORY ITEM TYPE</h2></th>

<tr>
<td align="left"><b>Item Type Name</b>:</td><td><input id="itname" name="itname" type="text"></td><td><b>Barcode Prefix:</b></td><td><input id="bar" name="barcodeprefix" type="text"></td>
</tr>
<tr>
<td align="left"><b>Units:</b></td><td><input id="unit" name="units" type="text"></td><td><b>Units Measure:</b></td><td><input id="name" name="unitmeasure" type="text"></td>
</tr>
<tr>
<td align="left"><b>Reorder Point:</b></td><td><input id="reorder" name="reorderpoint" type="text"></td>
</tr>
<tr>
<td align="left"><b>Age Sensitive</b>:</td><td><input id="agesent" name="agesent" type="radio"><b>Yes&nbsp;&nbsp;</b><input id="name" type="radio" checked><b>No</b></td>
</tr>
<tr>
<td align="left"><b>Validity Days:</b></td><td><input id="valid" name="vdays" type="text" value ="-1"></td>
</tr>
<tr>
<td align="left"><b>Notes:</b></td><td><input id="name" name="notes" type="text" style="height: 100px;"></td>
</tr>
<tr>
<td><button type="submit">Submit Information</button></td>
            <td><input type="reset"></td>
</tr>
</table>
 <input type="hidden" name="enterItemType3">
</div>
</body>
</html>