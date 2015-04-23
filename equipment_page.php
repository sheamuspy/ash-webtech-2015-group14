<?php
	session_start();
	if(!isset($_SESSION['USERNAME'])){
		header("location:login.php");
	}

?>

<html>
	<head>
		<title>Equipment</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="jquery-2.1.3.js"></script>
        <script>
			var curId;
//			function loadEquip(){
//				$("#tableExample").load("equip.php");
//			}

			function sendRequest(theURL){
				var obj = jQuery.ajax({url:theURL, async:false});
				var response = jQuery.parseJSON(obj.responseText);
				return response;
			}
			
            function loadAddEquipmentForm(){
                $("#contentSpace").load("add_equipment.php");
				exit.hidden=false;
            }
            function loadViewEquip(eid){
                $("#contentSpace").load("view.php?id=" + eid);
				curId=eid;
				exit.hidden=false;
				deleteE.hidden=false;
				edit.hidden=false;
            }
            function loadEditEquipmentForm(){
                $("#contentSpace").load("edit_equipment.php?eid="+curId);
            }
			
			function editEquipment(){
				var eName=en.value;
				var serialNum=sn.value;
				var inventNumber=inv.value;
				var labId=lid.value;
				var datePurchased=dp.value;
				var supplierId=sid.value;
				var description=ed.value;
				var objResult= sendRequest("equipment_methods.php?cmd=2&eid="+curId+"&en="+eName+"&sn="+serialNum+"&in="+inventNumber+"&lid="+labId+"&dp="+datePurchased+"&sid="+supplierId+"&ed="+description);
				
				if(objResult.result==1){
					location.reload();
					divStatus.innerHTML = objResult.message;
				}				
			}
			
			function addEquipment(){
				var eName=en.value;
				var serialNum=sn.value;
				var inventNumber=inv.value;
				var labId=lid.value;
				var datePurchased=dp.value;
				var supplierId=sid.value;
				var description=ed.value;
				var objResult= sendRequest("equipment_methods.php?cmd=1&en="+eName+"&sn="+serialNum+"&in="+inventNumber+"&lid="+labId+"&dp="+datePurchased+"&sid="+supplierId+"&ed="+description);
				if(objResult.result==1){
					location.reload();
					divStatus.innerHTML = objResult.message;
					
				}
				
			}
			
            function search(){
                $("#search").load("searchequipment.php");
            }
            function deleteEquip(){
				var objResult= sendRequest("equipment_methods.php?cmd=3&eid="+curId);
				if(objResult.result==1){
					location.reload();
					divStatus.innerHTML = objResult.message;
					
				}
            }
			
			function exitView(){
				contentSpace.innerHTML="";
				exit.hidden=true;
				deleteE.hidden=true;
				edit.hidden=true;
			 }
		</script>
	</head>
	<body>
		<table align='center'>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<a href="index.php" style="text-decoration:none"><div class="menuitem">Home</div></a>
                    <a href="equipment_page.php" style="text-decoration:none"><div class="menuitem"><b>Equipment</b></div></a>
					<a href="labpage.php" style="text-decoration: none;"><div class="menuitem">Labs</div></a>
					<div class="menuitem">Supplier</div>
					<a href="history.php" style="text-decoration: none;"><div class="menuitem">History</div></a>
					<a href="logout.php" style="text-decoration: none;"><div class="menuitem">Logout</div></a>
				</td>
				<td id="content">
					<div id="divPageMenu">
					<div style="float:left">
						<span id="change" class="menuitem"  onclick="loadAddEquipmentForm()">Add Equipment</span>
						<span class="menuitem" id="edit" onclick="loadEditEquipmentForm()" hidden="true">Edit</span> 
						<span class="menuitem" onclick="deleteEquip()"id="deleteE" hidden="true">Delete</span>
						<span class="menuitem" id="exit" onclick="exitView()" hidden="true">Exit</span>
					</div>
                        <div align="right">
						<input type="text" placeholder="Search" id="txtSearch"/>
						<span id="search" class="menuitem" onclick="search()">search</span>
						</div>
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						<div id="contentSpace"></div>
						<table id="tableExample" class="reportTable" width="100%">
                            <?php

include_once("equipment.php");
$obj= new equipment();
$obj->display_equipment();
//$lab= new equipment();
	echo"<tr class='header'>
		<td>Serial Number</td>
		<td>Equipment Name</td>
		<td>Lab</td>
		<td>Date Purchased</td>
	    </tr>";

    $count=0;
	while ($row=$obj->fetch()) {
        if ($count==0) {
            $color = 'row2';
            $count=1;
        }
        else {
            $color = 'row1';
            $count=0;
        }
		echo "<tr onclick='loadViewEquip($row[equipment_id])' class=$color><td>$row[serial_number]</td>";
		echo "<td>$row[equipment_name]</td>";
		echo "<td>$row[lab_id]</td>";
		echo "<td>$row[date_purchased]</td></tr>";
	}
				
?>
					</div>
		</table>
	</body>
</html>	