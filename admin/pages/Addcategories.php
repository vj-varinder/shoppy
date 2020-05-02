<?php

$basepath = $_SERVER["DOCUMENT_ROOT"]."/shoppy";

include($basepath.'/config/config.php');

//include the database connection file
include($basepath.'/libraries/Database.php');

  Include "index.php";
?>
<?php
	if($_POST)
	{
		$categoryName=$_POST['categoryName'];
		$categoryDescription=$_POST['categoryDescription'];
		//create Database object
		$db=new Database();

		//create select query
		$query="insert into tb_category
			(
			dbCategoryName,
            dbDescription
			)
			values
			(
				'$categoryName','$categoryDescription'
				)";

				//run query
				$db->insert($query);
	}

 ?>

<head>
        <script type="text/javascript">
        function validate()
        {
            var name=(document.getElementById('name').value).trim();
            var Description=(document.getElementById('categoryName').valu).trim();
        }
        </script>
     <style type="text/css">
    .labelHeading{
      padding:5px;
    }
  </style>
</head>
<form class="form-group" onsubmit="return validate()" method="post">
<div style="width:30%"class="form-group">
    <label class="labelHeading">Category Name</label>
    <input class="form-control" id="name" name="categoryName"placeholder="Enter category name">
    <label class="labelHeading">Category Description</label>
    <input class="form-control" id="categoryName" name="categoryDescription" placeholder="Enter category description">
    <br />
<span> <button type="submit" value="submit" class="btn btn-default">Add</button></span>
</div>
</form>
<?php
$query="select * from tb_category";

//run query
$all_categories=$db->select($query);

?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Categories details
                <span class="pull-right"><i class="glyphicon-plus"></i> <a href="Addcategories.php">Add New Category</a></span>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Category_ID</th>
                            <th>Category_Name</th>
                            <th>Category_Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($all_categories) :?>
							<?php
							while($cat=$all_categories->fetch_assoc())
							:
							?>
							<tr>
								<td>
									<?php echo $cat['dbCategoryId']; ?>
								</td>
								<td>
									<a href="AddSubCategories.php?catId=<?php echo $cat['dbCategoryId']; ?>"><?php echo $cat['dbCategoryName']; ?></a>
								</td>
								<td>
									<?php echo $cat['dbDescription']; ?>
								</td>
							</tr>
							<<?php
						endwhile;
						?>
					<?php else: ?>
						<p>
							there is no data yet
						</p>
					<?php endif; ?>
                    </tbody>
                </table>
