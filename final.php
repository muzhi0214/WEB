<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Interface Web</title>
	<style>
			body, html {
				margin:0;
				padding:0;
				font-family:Arial;
			}
			h1 {
				margin-bottom:10px;
			}
			#main {
				position:relative;
				width:940px;
				padding:20px;
				margin:auto;
			}
			#heatmapArea {
				position:relative;
				float:left;
				width:600px;
				height:350px;
			      border:1px dashed black;
			}
		
			#tableArea {
				position:relative;
				float:left;
				width:600px;
				height:350px;
			      
			}
			#controlArea {
				position:relative;
				float:left;
				width:130px;
				padding:20px;
				padding-top:0;
			}
			.btn {
				margin-top:25px;
				padding:10px 20px 10px 20px;
				-moz-border-radius:15px;
				-o-border-radius:15px;
				-webkit-border-radius:15px;
				border-radius:15px;
				border:2px solid black;
				cursor:pointer;
				color:white;
				background-color:black;
			}
	
			h2{
				margin-top:0;
			}
	</style>		
</head>

<body>
<?php
echo $php_array[1];
?>
<div id="main">
<fieldset>
<legend> Chose what you want </legend> 
<p>  
 Dispaly:
<select name="display">
<option value="all"  selected="selected">All</option>
<option value="name">BY Name</option>
<option value="chose">BY Date</option>
<option value="movement">Mouvement</option>
</select>
</p>
<p>  
<label> Choose a date  <input type="date" />  
</label>

</p>
<p> 
<form id="control" name="input" action="request.php" method="post">
Input a username:
<input type="text" name="user"/>
<input type="submit" value="Send me your name!">
</p>
</fieldset>
</form>

<div id="controlArea">
<div id="dataset" class="btn">HeatMap</div>
<br />
<textarea id="data" cols=10 rows=15>
{max: 90, data: [
{x: 100, y: 100, count: 80},
{x: 120, y: 120, count: 60},
{x: 100, y: 80, count: 90},
{x: 111, y: 110, count: 60},
{x: 201, y: 150, count: 90},
{x: 311, y: 110, count: 60},
{x: 121, y: 510, count: 70},
{x: 511, y: 110, count: 60},
{x: 211, y: 110, count: 50},
{x: 191, y: 110, count: 20},
{x: 511, y: 110, count: 40}
]}
</textarea>
</div>
			
<div id="heatmapArea">
</div>

<div id="controlArea">
<div id="table" class="btn">Table</div>
</div>

<div id="tableArea">
<textarea id="txtArea" cols=72 rows=10  ></textarea> 
</div>

</div>

<script type="text/javascript" src="../../src/heatmap.js"></script>
<script type="text/javascript">
		window.onload = function(){
		var xx = h337.create({"element":document.getElementById("heatmapArea"), "radius":25, "visible":true});

		document.getElementById("dataset").onclick = function(){
		var el = document.getElementById("data").value;
		var obj = eval('('+el+')');
	      xx.store.setDataSet(obj);
		};

		document.getElementById("table").onclick = function(){
		var tempStr = ""; 
var filePath= "E:\\1.xls"; 
var oXL = new ActiveXObject("Excel.application"); 
var oWB = oXL.Workbooks.open(filePath); 
oWB.worksheets(1).select(); 
var oSheet = oWB.ActiveSheet; 
try{ 
for(var i=2;i<46;i++) 
{ 
if(oSheet.Cells(i,1).value =="null" || oSheet.Cells(i,2).value =="null" ) 
break; 
var a = oSheet.Cells(i,1).value.toString()=="undefined"?"":oSheet.Cells(i,1).value; 
tempStr+=(" "+oSheet.Cells(i,1).value+ 
" "+oSheet.Cells(i,2).value+ 
" "+oSheet.Cells(i,3).value+ 
" "+oSheet.Cells(i,4).value+ 
" "+oSheet.Cells(i,5).value+"\n"); 
} 
}catch(e) 
{ 
document.all.txtArea.value = tempStr; 
} 
document.all.txtArea.value = tempStr; 
oXL.Quit(); 
CollectGarbage(); 
		
		}
		
	};
		
</script>

<script type="text/javascript">

    var jArray= <?php echo json_encode($phpArray ); ?>;

    for(var i=0;i<6;i++){
        alert(jArray[i]);
    }

 </script>


</body>
</html>
