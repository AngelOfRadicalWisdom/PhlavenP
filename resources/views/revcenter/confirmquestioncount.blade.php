<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
        <div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    <br>
    <!-- <div class="w3-display-middle"> --><center>
        <!-- <h1 class="w3-jumbo w3-animate-top">&nbsp; Exam Type</h1><br>

        <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <!-- <hr class="w3-border-grey" style="margin:auto;width:40%">  -->
        <div div style="background-color: white; width: 90%; border-radius: 25px;">
        <br><br>
		<h1><?php echo $lesson_name;?>
		</h1>
        <hr style="width:80%;border-color:#006dcc">
        <form action="<?php echo url('/revcenter/settings/newquestion/'.$lesson_name)?>" method="post">
        <?php echo csrf_field()?>
        <table style="margin: 0px auto; width:50%">
        <tr>
            <td>Choice Count:</td>
            <td><input type="text" name="count" size="5"></td>
        </tr>
        </table>
        <br><br>
        <button type="submit" class="button">Submit</button>
        </form>
        <hr style="width:80%;border-color:#006dcc">
        <br><br>
	</div>