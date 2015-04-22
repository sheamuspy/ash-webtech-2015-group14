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
            function search(){
                $("#search").load("searchequipment.php");
            }
            function deleteEquip(){
                $("#contentSpace").load("delete_equipment.php");
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
					<div class="menuitem">Home</div>
                    <a href="equipment_page.php" style="text-decoration:none"><div class="menuitem">Equipment</div></a>
					<div class="menuitem">Lab</div>
					<div class="menuitem">Supplier</div>
					<a href="history.php" style="text-decoration: none;"><div class="menuitem">History</div></a>
				</td>
				<td id="content">
					<div id="divPageMenu">
					<div style="float:left">
						<span id="change" class="menuitem"  onclick="loadAddEquipmentForm()">Add Equipment</span>
						<span class="menuitem" id="edit" onclick="loadEditEquipmentForm()" hidden="true">Edit</span> 
						<span class="menuitem" id="deleteE" hidden="true">Delete</span>
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
						<div id="contentSpace">Content space<span class="clickspot">click here </span></div>
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