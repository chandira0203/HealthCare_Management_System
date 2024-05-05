<?php
include("header.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM doctor_timings WHERE doctor_timings_id='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('doctortimings record deleted successfully..');</script>";
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
      <li class="first">View Doctor Timings</li>
	</ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>View Doctor Timings record</h1>
    <table  style="width: 100%;" class="table table-bordered" style="width:100%" id="datatable">
      <thead>
        <tr>
          <th>Doctor</th>
          <th>Timings available</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          <?php
		$sql ="SELECT * FROM doctor_timings ";
    if(isset($_SESSION['doctorid']))
    {
    $sql = $sql . " where doctorid='$_SESSION[doctorid]'";
    }
		$qsql = mysqli_query($con,$sql);
    echo mysqli_error($con);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqldoctor = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
			$qsqldoctor = mysqli_query($con,$sqldoctor);
			$rsdoctor = mysqli_fetch_array($qsqldoctor);
			
			$sqldoct = "SELECT * FROM doctor_timings WHERE doctor_timings_id='$rs[doctor_timings_id]'";
			$qsqldoct = mysqli_query($con,$sqldoct);
			$rsdoct = mysqli_fetch_array($qsqldoct);
			
        echo "<tr>
          <td>&nbsp;$rsdoctor[doctorname]</td>
          <td>&nbsp;$rsdoct[start_time] - $rsdoct[end_time]</td>
          <td>&nbsp;$rs[status]</td>
          <td>&nbsp;<a href='doctortimings.php?editid=$rs[doctor_timings_id]' class='btn btn-info'>Edit</a>  
          <a href='viewdoctortimings.php?delid=$rs[doctor_timings_id]' class='btn btn-danger'>Delete</a> </td>
        </tr>";
		}
		?>
      </tbody>
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