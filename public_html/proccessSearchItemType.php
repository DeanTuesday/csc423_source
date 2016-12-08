

<!--Script to insert a vendor into an online Database-->
<center><font color='red' size='20'>SELECT * FROM InventoryItemType WHERE itemTypeName LIKE 'co'</font></center><html>
  <head>
    <style>
    html {
    }
    hr {
      color: black;
    }
      h1 {
        color: black;
        font-size: 20px;
        text-align: center;
      }
      table, tr, td {
        padding: 5px;
      }
      th {
        padding: 5px;
        text-align: center;
      }
      table.center {
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
	<form id="update" method="post">
    <hr>

    <table class="center">
      <tr>
        <td>Item Type Name:</td>
        <td><input type="text" name="itName" id="itName" value=""></td>
      </tr>
      <tr>
        <td>Barcode Prefix:</td>
        <td><input type="text" name="bcPrefix" id="bcPrefix" value=""></td>
      </tr>
      <tr>
        <td>Units:</td>
        <td><input type="text" name="units" id="units" value=""></td>
      </tr>
      <tr>
        <td>Unit Measure:</td>
        <td><input type="text" name="uMeasure" id="uMeasure" value=""></td>
      </tr>
      <tr>
        <td>Age Sensitive:</td>
        <td><input type="text" name="as" id="as" value=""></td>
      </tr>
      <tr>
        <td>Validity Days:</td>
        <td><input type="text" name="vdays" id="vdays" value=""></td>
      </tr>
      <tr>
        <td>Reorder Point:</td>
        <td><input type="text" name="rpoint" id="rpoint" value=""></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="text" name="Email" id="Email" value=""></td>
      </tr>
	  <tr>
		<td>Status:</td>
		<td><input type="text" name="status" id="status" value=""></td>
	  </tr>
      <tr>
        <td>Vendor Contact:</td>
        <td><input type="text" name="venContact" id="venContact" value=""></td>
      </tr>
      <tr>
        <td>Active Orders:</td>
        <td><input type="text" name="venActive" id="venActive" value=""></td>
      </tr>
    </table>
	    <table class="center">
      <tr>
      </tr>
   </table>
  </form>
  </body>
</html>
