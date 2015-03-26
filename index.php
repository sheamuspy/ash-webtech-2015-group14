<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="jquery-2.1.3.js"></script>
		<script>
			
			function sendRequest(theURL){
				var obj = $.ajax({url:theUrl, async:true});
				
				var result = $.parseJSON(obj.reponseTxt);
				
				return result;
			}
			
			function searchActivities(){
				var search = searchBy.value;
				var txtToSearch = txtSearch.value;
				/*var objResult = sendRequest("transaction_methods.php?cmd=3&sb=" +search +"&st="+txtToSearch);
				if(objRequest.result == 0){
				
				}else{
				
				}*/
				$("#table").load("transaction_methods.php?cmd=3&sb=" +search +"&st="+txtToSearch);
		 		
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
				$("#table").load("transaction_methods.php?cmd=1");
			}
			
			function veiwTransaction(id){
				$("#contentSpace").load("transaction_methods.php?cmd=2&id="+id);
			}
			
		</script>
	</head>
	<body>
		<table align='center'>
			<tr>
				<td colspan="2" id="pageheader">
					
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">Home</div>
					<div class="menuitem">Equipment</div>
					<div class="menuitem">Labs</div>
					<div class="menuitem">Supplier</div>
					<div onclick="getHistory()" class="menuitem">History</div>
				</td>
				<td id="content">
					<div id="divPageMenu" align="right">
						<span class="menuitem" ><select id="searchBy"><option value="0">Equipment</option>
														<option value="1">Date</option>
														<option value="2">User name</option>
														</select>
						</span>
						<input type="text" id="txtSearch" placeholder="Search"/>
						<span class="menuitem" onclick="searchActivities()">search</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						<div id="contentSpace">Content space
						<span class="clickspot">click here </span>
						</div>
						<table id="table" class="reportTable" width="100%">
							<tr class="header">
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
			</tr>
		</table>
	</body>
</html>	