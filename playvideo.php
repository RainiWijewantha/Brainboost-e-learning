<?php  
  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

?> 

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

    <style type="text/css">
      .row iframe {
        width: 100%;
        height: 70%;
      }
    </style>
</head>
<body>
 <div class="container" >
 	<video width="50%"  controls>
		  <source src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="video/mp4">
		  <source src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="video/ogg"> 
		</video>
      
        <div class="col-lg-12">Description</div>
         <div class="col-lg-12">
           <label class="col-md-2" class="control-label">Chapter :</label>
           <label class="col-md-10" class="control-label"><?php echo $res->LessonChapter; ?></label>
         </div>
         <div class="col-lg-12">
           <label class="col-md-2" class="control-label">Title : </label>
           <label class="col-md-10" class="control-label"><?php echo $res->LessonTitle; ?></label>
         </div> 
 </div> 
    </body>
    </html>