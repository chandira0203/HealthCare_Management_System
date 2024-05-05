<?php
include("header.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM admin WHERE adminid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('admin record deleted successfully..');</script>";
	}
}
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
<div class="wrapper col2">
  <div id="breadcrumb">View Adminstrator Record</div>
</div>
<div class="wrapper col4">
  <div id="container">
  
  <section class="container" style="width: 100%;">
    <table  style="width: 100%;" class="table table-bordered" id="datatable">
      <thead>
        <tr>
          <th width="12%" >Admin Name</th>
          <th width="11%">Login ID</th>
          <th width="12%">Status</th>
          <th width="10%">Action</th>
        </tr>
        </thead>
       <tbody>
       <?php
		$sql ="SELECT * FROM admin";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
        echo "<tr>
          <td>&nbsp;$rs[adminname]</td>
          <td>&nbsp;$rs[loginid]</td>
          <td>&nbsp;$rs[status]</td>
          <td>&nbsp;
		  <a href='admin.php?editid=$rs[adminid]' class='btn btn-info'>Edit</a> | <a href='viewadmin.php?delid=$rs[adminid]' class='btn btn-danger'>Delete</a> </td>
        </tr>";
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