<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
@include('styles.draganddrop')

<body>
	@include('includes.revcenterheader')
	
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white" style="color:white">
	<br>
	<h2 id="app_status" style="text-align:center"></h2>
	<br>
	<center>
        <form action="<?php echo url('/learningpath/new')?>" method="POST">
			<div div style="background-color: white; width: 90%; border-radius: 25px;">
			<br><br>
			<h1 style="color:black"><b>Learning Path</b></h1>
			<h5 style="color:black">Click the Nodes to add a new Chapter to them</h5>
			<hr style="width:80%;border-color:#006dcc">
			<table width="100%">
				<tr>
					<td width="23.75%"></td>
					<td width="23.75%"></td>
					<td width="23.75%"></td>
					<td width="23.75%"></td>
					<td width="5%"></td>
				</tr>
				<tr style="background-color:black;color:white;">
					<td style="width:20%" colspan="5" style="text-align:center"><b style="text-align:center"><a href="#" style="color:white"><h4>Diagnostic Exam</h4></a></td>
				</tr>
			@foreach($nodes as $node)
				@foreach($learningpathnodes as $learningpathnode)
					@if($node->chapter_ID == $learningpathnode->chapter_ID)
					@if($learningpathnode->parent_ID == "Mock")
					<tr>			
						<td style="background-color:#585858"></td>
						<td style="background-color:#585858"></td>
						<td style="background-color:#585858;color:white;text-align:left" colspan="2"><a href="http://localhost:8000/revcenter/settings/node/newsubnode/{{$learningpathnode->learningpathnode_ID}}" style="color:white"><h4>{{$node->chapter_name}} &nbsp;&nbsp;</h4></a></td>
						<td style="background-color:#585858;color:white"><a href="http://localhost:8000/revcenter/delete/chapter/{{$learningpathnode->learningpathnode_ID}}" style="color:white">X</a></td>
					</tr>
						<!--Printing of Chapter Subnodes-->
						@foreach($learningpathnodes as $subnoderow1)
						
						@if($learningpathnode->learningpathnode_ID == $subnoderow1->parent_ID)
						<tr>
						<td style="background-color:#585858"></td>
						<td style="background-color:#585858;color:white;text-align:left" colspan="2"><a href="http://localhost:8000/revcenter/settings/node/newsubnode/{{$subnoderow1->learningpathnode_ID}}" style="color:white"><h4>{{$subnoderow1->chapters->chapter_name}}</h4></a></td>
						<td style="background-color:#585858"></td>
						<td style="background-color:#585858;color:white"><a href="http://localhost:8000/revcenter/delete/chapter/{{$subnoderow1->learningpathnode_ID}}" style="color:white">X</a>&nbsp;&nbsp;&nbsp;</td>


						</tr>
						<!--Printing of Chapter Subnodes-->
						@foreach($learningpathnodes as $subnoderow2)
						@if($subnoderow1->learningpathnode_ID == $subnoderow2->parent_ID)
						<tr>
						<td style="background-color:#585858;color:white;text-align:left" colspan="2"><a href="http://localhost:8000/revcenter/settings/node/newsubnode/{{$subnoderow2->learningpathnode_ID}}" style="color:white"><h4>{{$subnoderow2->chapters->chapter_name}}</h4></a></td>
						<td style="background-color:#585858"></td>
						<td style="background-color:#585858"></td>
						<td style="background-color:#585858;color:white"><a href="http://localhost:8000/revcenter/delete/chapter/{{$subnoderow2->learningpathnode_ID}}" style="color:white">X</a>&nbsp;&nbsp;&nbsp;</td>

						</tr>
						@endif()
					@endforeach()
						@endif()
					@endforeach()
						<tr>			
						<td style="background-color:#585858;color:white" colspan="5"><hr></td>
						</tr>
					@endif()
					@endif()
					
				@endforeach()
			@endforeach()
			
			<tr style="background-color:#585858;color:white;">
					<td colspan="5" style="text-align:center"><a href="http://localhost:8000/revcenter/settings/node/newnode" style="color:white"><h4>+</h4></a></td>
				</tr>
			<tr style="background-color:black;color:white;">
					<td colspan="5" style="text-align:center"><a href="#" style="color:white"><h4>Mock Exam</h4></a></td>
				</tr>
			</table>
			<hr style="width:80%;border-color:#006dcc">
			<br><br>
			<a href="http://localhost:8000/revcenter/settings/learningpath" class="button">Save Learning Path</a>
			<br><br>
		</form>
		</div>
		<br>	<br>	<br>
		</center>
    </body>
</html>