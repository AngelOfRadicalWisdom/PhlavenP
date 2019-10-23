<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
<center>
	@include('includes.revcenterheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
<br>
<center>
    <div div style=" background-color: white; width: 900px; border-radius: 25px;margin:0 auto">
    <br>
<!-- <div class="w3-display-middle"> --><center>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; <?php echo $chapter_name; ?></h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr style="width:80%;border-color:#006dcc"><br>
	
</center>
	<div class="big-message">
    <h1 style="color:black"> New Lesson<br><br></h1>
	<form action="<?php echo url('/revcenter/settings/savelesson')?>" method="post">
	<?php echo csrf_field()?>
            <input type="hidden" name="chapter_ID" value="<?php echo $node_ID?>">
            <input type="hidden" name="chapter_name" value="<?php echo $node_name?>">
	<table style="margin: 0px auto; width:50%">
        <tr>
            <td style="color:black"><h2>Lesson Name:</h2></td>
            <td><input type="text" placeholder="Lesson Name" name="lesson_name" required></td>
        </tr>
        <tr>
            <td style="color:black"><h2>Description:</h2></td>
            <td><textarea name="lessondesc" rows="10" cols="50" required></textarea></td>
        </tr>  
    </table>
    <br><br>   
    
    <button type="submit" class="button">Submit</button>
	
</form>
	</div>
	<br><br>
</center>