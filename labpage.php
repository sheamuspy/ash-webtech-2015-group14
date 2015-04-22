<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="style.css">
		<script src="jquery-2.1.3.js"></script>
		<script>
			function sendRequest(u){
				var obj=$.ajax({url:u,async:false});
				var result=$.parseJSON(obj.responseText);
				return result;	
			}
			function addData(){
				$("#view").load("addlab.php");
			}
			function viewData(lab_id){
				$("#view").load("viewlabs.php?lab_id="+lab_id);
			}
			function editData(lab_id){
				$("#view").load("editlab.php?lab_id="+lab_id);
			}
			function deleteData(id){
				var url="lab_functions.php?cmd=1&id="+id;
				var obj=sendRequest(url);
				if(obj.result==1){
					$("#divStatus").text(obj.message);
				}else{
					$("#divStatus").text(obj.message);
					$("#divStatus").css("backgroundColor","red");
				}
				document.location='labpage.php';
				return;
			}
			function search(){
				var search_text=txtSearch.value;
				var strUrl="lab_functions.php?cmd=2&st="+search_text;
				var objResult=sendRequest(strUrl);
				if(objResult.result==1){
					obj=objResult.labs;
					var row = '<table class="reportTable" width="100%">';
						row = row+"<tr class='header'><td>Lab Name</td><td>Department Head</td><td>Location</td><td></td><td></td></tr>";
			    	for(var i=0; i<obj.length; i++){
			    	row=row+"<tr class='row1'>";
			    	row=row+"<td>" + obj[i].lab_name + "</td>";
			    	row=row+"<td>" + obj[i].department_head + "</td>";
			    	row=row+"<td>" + obj[i].lab_location + "</td>";
			    	row=row+"<td style='cursor:pointer' onclick= 'editData($id)'>Edit</td><td style='cursor:pointer' onclick= 'deleteData($id)'>Delete</td></tr>";
			    	row=row+"</tr>";
			      	}
					row = row+"</table>";
					$("#tableExample").html(row);
				}
			}	
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					<b>Ashesi Engineering Inventory</b>
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">Home</div>
					<div class="menuitem">Equipment</div>
					<a href="labpage.php"><div class="menuitem">Lab</div></a>
					<div class="menuitem">Supplier</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" onclick="addData()">Add Lab</span>
						<input name="str" type="text" id="txtSearch" />
						<button><span style='cursor:pointer' onclick="search()">Search</span></button>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						<div id="view"></div>
						<table id="tableExample" class="reportTable" width="100%">
							<?php
								include_once("labs.php");
								$obj = new labs();
								$obj->get_all_labs();
								echo "<tr class='header'>
										<td>Lab Name</td>
										<td>Department Head</td>
										<td>Location</td>
										<td></td>
										<td></td>
										</tr>";
								while($row=$obj->fetch()){
									$id=$row['lab_id'];
									echo "<tr class='row1'>
									<td onclick='viewData($id)'>{$row['lab_name']}</td>
									<td>{$row['department_head']}</td>
									<td>{$row['lab_location']}</td>
									<td style='cursor:pointer' onclick= 'editData($id)'>Edit</td>
									<td style='cursor:pointer' onclick= 'deleteData($id)'>Delete</td></tr>";
								}
							?>
						</table>
					</div>
				</td>
			</tr>
		</body>
</html>	