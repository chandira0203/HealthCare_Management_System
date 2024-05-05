<?php
include("header.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM doctor WHERE doctorid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('doctor record deleted successfully..');</script>";
	}
}
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
<div class="wrapper col2">
  <div id="breadcrumb">View  Doctor  </div>
</div>
<div class="wrapper col4">
  <div id="container">
 
<section class="container" style="width: 100%;">

	<table class="order-table">
      <thead>
   
    <table  style="width: 100%;" class="table table-bordered" style="width:100%" id="datatable">
      <thead>
        <tr>
          <th>Doctor Name</th>
          <th>Mobile Number</th>
          <th>Department</th>
          <th>Login ID</th>
     
          <th>Education</th>
          <th>Experience</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
       <tbody>
          <?php
		$sql ="SELECT * FROM doctor";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			
			$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
			$qsqldept = mysqli_query($con,$sqldept);
			$rsdept = mysqli_fetch_array($qsqldept);
        echo "<tr>
          <td>&nbsp;$rs[doctorname]</td>
          <td>&nbsp;$rs[mobileno]</td>
		   <td>&nbsp;$rsdept[departmentname]</td>
			<td>&nbsp;$rs[loginid]</td>
			
			 <td>&nbsp;$rs[education]</td>
			<td>&nbsp;$rs[experience]</td>
          <td>$rs[status]</td>
           <td>&nbsp;
		   <a href='doctor.php?editid=$rs[doctorid]' class='btn btn-info' >Edit</a> 
       <a href='viewdoctor.php?delid=$rs[doctorid]' class='btn btn-danger' >Delete</a> </td>
        </tr>";
		}
		?>      </tbody>
    </table>
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