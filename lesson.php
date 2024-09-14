<h1><?php echo $title;?></h1>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image" href="img/logo-round.png" />
    <title>Brainboost E Learning Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
</head>


<body>

<div class="col-lg-6">
	<h3>PDF</h3>
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			<thead>
				<th width="2%">#</th>
				<th>Chapter</th>
				<th>Title</th> 
				<th width="2%">Action</th>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM tbllesson WHERE Category='Docs'";
				$mydb->setQuery($sql);
				$cur = $mydb->loadResultList();
				foreach ($cur as $result) {
					# code...
					echo '<tr>';
					echo '<td></td>';
					echo '<td>'.$result->LessonChapter.'</td>';
					echo '<td>'.$result->LessonTitle.'</td>';
					echo '<td><a href="index.php?q=viewpdf&id='.$result->LessonID.'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> View File</a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<div class="col-lg-6">
	<h3>VIDEO</h3>
	<div class="table-responsive">
		<table id="example2" class="table table-bordered">
			<thead>
				<th width="2%">#</th>
				<th>Decription</th>
				<th width="2%">Action</th>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM tbllesson WHERE Category='Video'";
				$mydb->setQuery($sql);
				$cur = $mydb->loadResultList();
				foreach ($cur as $result) {
					# code...
					echo '<tr>';
					echo '<td></td>';
					echo '<td>'.$result->LessonTitle.'</td>'; 
					echo '<td><a href="index.php?q=playvideo&id='.$result->LessonID.'" class="btn btn-xs btn-info"><i class="fa fa-play"></i> Play Video</a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
			</body>
			</html>