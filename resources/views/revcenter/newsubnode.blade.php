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

    <div div style=" background-color: white; width: 80%; border-radius: 25px;">
    <br>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; New Chapter</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr style="width:80%;border-color:#006dcc"><br>
	<form action="<?php echo url('/revcenter/settings/subnode/savenode')?>" method="post">
	<?php echo csrf_field()?>
    <!-- <input type="text" name="nodename" placeholder="New Node Name"><br><br> -->
	<table style="margin: 0px auto;width:80%">
        <tr >
            <td style="color:black"><h2>Chapter Name:</h2></td>
            <td><input type="text" placeholder="Chapter Name" name="chaptername"></td>
        </tr>
        <tr >
            <td style="color:black"><h2>Parent Chapter</h2></td>
            <td><h2>{{$parentchapter->chapters->chapter_name}}<input type="hidden" name="chapterparent" value="{{$parentchapter->learningpathnode_ID}}"></h2></td>
        </tr>
        <tr>
            <td style="color:black"><h2>Description:</h2></td>
            <td><textarea name="desc" rows="10" cols="50"></textarea></td>
        </tr>   
        <br><br>
    </table>
    
   <center> <button type="submit" class="button">Submit</button> </center>
	
</form>
	
</center>
	</div>