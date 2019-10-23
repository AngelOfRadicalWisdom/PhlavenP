<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<br>
<!-- <div class="w3-display-middle"> --><center>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; Chapters</h1><br>
    <hr style="width:80%">
        <br><br>        
        <table style="margin: 0px auto;width:80%">
		@foreach($nodes as $node)
            <tr>
			<div class='button'><h3><a href="http://localhost:8000/revcenter/settings/node/viewnode/{{$node->chapter_name}}" class="body-link" style="color:white">{{$node->chapter_name}}</a></h3></div>
            </tr>
		@endforeach
        </table>
        <br><br>
	</div>
    </center>