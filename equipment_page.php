<html>
	<head>
		<title>Equipment</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="jquery-2.1.3.js"></script>
        <script>
//			function loadEquip(){
//				$("#tableExample").load("equip.php");
//			}
            function addEquip(){
                $("#contentSpace").load("addequipment.php");
            }
            function viewEquip(eid){
                $("#contentSpace").load("view.php?id=" + eid);
                $("#change1").load("change.php");
            }
            function editEquip(){
                $("#contentSpace").load("editequipment.php");
            }
            function search(){
                $("#search").load("searchequipment.php");
            }
            function deleteEquip(){
                $("#contentSpace").load("deletequipment.php");
            }
		</script>
	</head>
	<body id="content">
		<table>
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
				</td>
				<td id="content">
					<div id="divPageMenu">
					<div style="float:left">
						<span id="change" class="menuitem"  onclick="addEquip()">Add Equipment</span>
					</div>
<!--
					    <span id="change1" class="menuitem" onclick="editEquip()"></span>
						<span id="change2" class="menuitem"></span>
-->
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
		echo "<tr class=$color><td>$row[serial_number]</td>";
		echo "<td>$row[equipment_name]</td>";
		echo "<td>$row[lab_id]</td>";
		echo "<td>$row[date_purchased]</td>";
        echo "<td onclick='viewEquip($row[equipment_id])'>Details</td>";
        echo "<td onclick='editEquip()'>Edit</td>";
        echo "<td onclick='deleteEquip()'>Delete</td></tr>";
	}
				
?>
					</div>
		</table>
	</body>
</html>	