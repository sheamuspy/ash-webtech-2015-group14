<?php
	session_start();
	if(!isset($_SESSION['USERNAME'])){
		header("location:login.php");
	}

?>
<html>
	<head>
		<title>History</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="jquery-2.1.3.js"></script>

		<script>
			
			function sendRequest(theURL){
				var obj = jQuery.ajax({url:theURL, async:false});
				var response = jQuery.parseJSON(obj.responseText);
				return response;
			}
			
			
			function searchActivities(){
				exitView();
				var search = searchBy.value;
				var txtToSearch = txtSearch.value;
				var objResult = sendRequest("transaction_methods.php?cmd=3&sb=" +search +"&st="+txtToSearch);
				$("#table").html(objResult.tabrow);
				$("#divStatus").html(objResult.message);
				divStatus.style.backgroundColor="green";
		 		
			}
			
			function displayActivities(){
				var row;
				var cell;
				for(i=0; i<activitiesArray.length;i++){
					row = table.insertRow();
					cell = row.insertCell(0);
					cell.innerHTML=activitiesArray[i].date;
					cell = row.insertCell(1);
					cell.innerHTML=activitiesArray[i].equipment;
					cell = row.insertCell(2);
					cell.innerHTML=activitiesArray[i].user;
					cell = row.insertCell(3);
					cell.innerHTML=activitiesArray[i].purpose;
				}
			}
			
			function getHistory(){
				var objResult = sendRequest("transaction_methods.php?cmd=1");
/*				if(objRequest.result == 0){
				
				}else{
				
				}*/
				$("#table").html(objResult.tabrow);
			}
			
			function veiwTransaction(id){
			
			
				$("#contentSpace").load("transaction_methods.php?cmd=2&id="+id);
				pm_exit.hidden=false;
			}
			
			 function exitView(){
				contentSpace.innerHTML="";
				pm_exit.hidden=true;
			 }
			
		</script>
	</head>
	<body>
		<table align='center'>
			<tr>
				<td colspan="2" id="pageheader">
					<b>Ashesi Engineering Inventory</b>
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div><?php echo $_SESSION['USERNAME']?><br> logged in</div>
					<a href="index.php" style="text-decoration:none"><div class="menuitem">Home</div></a>
					<a href="equipment_page.php" style="text-decoration:none"><div class="menuitem">Equipment</div></a>
					<a href="labpage.php" style="text-decoration: none;"><div class="menuitem">Labs</div></a>
					<a href="suppliers_page.php" style="text-decoration:none"><div class="menuitem">Supplier</div></a>
					<a href="history.php" style="text-decoration: none;"><div class="menuitem"><b>History</b></div></a>
					<a href="logout.php" style="text-decoration: none;"><div class="menuitem">Logout</div></a>
				</td>
				<td id="content">
					<div id="divPageMenu">
					<div style="float:left">
					<span class="menuitem" id="pm_exit" hidden="true" onclick="exitView()">Exit</span>
					</div>
					<div align="right">
						
						<input type="text" id="txtSearch" placeholder="Search"/>
						<span class="menuitem" ><select id="searchBy"><option value="0">--Search by--</option>
														<option value="1">Equipment</option>
														<option value="2">Date</option>
														<option value="3">User name</option>
														</select>
						</span>
						<span class="menuitem" onclick="searchActivities()">search</span>
							</div>
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						<div id="contentSpace">
						</div>
						<table id="table" class="reportTable" width="100%">
						<!--	<tr class="header">
								<td>column1</td>
								<td>column2</td>
								<td>column3</td>
								<td>column4</td>
							</tr>
							<tr class="row1">
								<td>data example</td>
								<td>123</td>
								<td>01/01/2014</td>
								<td>data</td>
							</tr>
							<tr class="row2">
								<td>data example</td>
								<td>123</td>
								<td>01/01/2014</td>
								<td>data</td>
							</tr>
					</div>
				</td>
			</tr>-->
			<?php
				include_once("transaction_methods.php");
			?>
		</table>
	</body>
</html>	