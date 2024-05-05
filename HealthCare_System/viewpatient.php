<?php
include("header.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM patient WHERE patientid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('patient record deleted successfully..');</script>";
	}
}
?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">View Patient records</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">

<section class="container" style="width: 100%;">
<h2>Search Patient - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer" /></h2>


	<table  style="width: 100%;" class="table table-bordered" style="width:100%" id="datatable">
      <thead>
        <tr>
          <th width="15%" height="36"><div align="center">Patient Name</div></th>
          <th width="20%"><div align="center">Admission details</div></th>
          <th width="28%"><div align="center">Address</div></th>    
          <th width="20%"><div align="center">Patient Profile</div></th>
          <th width="17%"><div align="center">Action</div></th>
        </tr>
        </thead>
      <tbody>
   <?php
		$sql ="SELECT * FROM patient";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
        echo "<tr>
          <td>$rs[patientname]<br>
		  <strong>Login ID :</strong> $rs[loginid] </td>
          <td>
		  <strong>Date</strong>: &nbsp;$rs[admissiondate]<br>
		 <strong>Time</strong>: &nbsp;$rs[admissiontime]</td>
		   <td>$rs[address]<br>$rs[city] -  &nbsp;$rs[pincode]<br>
Mob No. - $rs[mobileno]</td>
			    <td><strong>Blood group</strong> - $rs[bloodgroup]<br>
<strong>Gender</strong> - &nbsp;$rs[gender]<br>
<strong>DOB</strong> - &nbsp;$rs[dob]</td>
          <td align='center'>Status - $rs[status] <br>";
if(isset($_SESSION['adminid']))
{
		  echo "<a href='patient.php?editid=$rs[patientid]'  class='btn btn-info' >Edit</a> | 
      <a href='viewpatient.php?delid=$rs[patientid]'  class='btn btn-danger' >Delete</a> <hr>;
<a href='patientreport.php?patientid=$rs[patientid]'  class='btn btn-primary' >View Details</a>";
}
		  echo "</td></tr>";
		}
		?>
      </tbody>
    </table>
</section>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>
<script>
	$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>