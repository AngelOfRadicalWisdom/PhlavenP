<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revieweeheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white" style="color:white">
	<br>
	<h2 id="app_status" style="text-align:center"></h2>
	<br>
	<center>
	
    <div div style=" background-color: white; width: 80%; border-radius: 25px;">
    <br><br>
		<h1 style="color:black"><?php echo $node_ID;?></h1>
        <br>
        <hr style="width:80%;border-color:#006dcc">
        <br>
		
		@if($prerequisitestatus === "notallowed")
            <table style="margin: 0px auto;width:0%;text-align:center">
            @foreach($lessons as $lesson)
            <tr>

                @foreach($lessons as $lesson)
                
                            
                        @foreach($lessonstatus as $status)
                        @if($status->lesson_ID == $lesson->lesson_ID)
                        @if($status->status == 1)   
                        <td><a href="http://localhost:8000/reviewee/startmodule/{{$lesson->revcenter_ID}}/{{$lesson->lesson_name}}/1" style="color:white" class="button" >{{$lesson->lesson_name}}✓</a></td>  
                        @else()
                        <td><div class='button' style='width:300px;background-color:#585858'><h1>{{$lesson->lesson_name}}</div></td>  
                        @endif()
                        @endif()
                @endforeach

            </tr>
            @endforeach

            </tr>
            @endforeach
            
            </table>
            <br><br>
            <h3 style="color:black"><?php echo $prerequisitemessage; ?></h3>
		@endif
        
        
        @if($prerequisitestatus === "allowed")
            <table style="margin: 0px auto;width:40%;text-align:center">
            @foreach($lessons as $lesson)
            <tr>
            

                
                            <td><a href="http://localhost:8000/reviewee/startmodule/{{$lesson->revcenter_ID}}/{{$lesson->lesson_name}}/1" style="color:white" class="button" >{{$lesson->lesson_name}}
                        @foreach($lessonstatus as $status)
                        @if($status->lesson_ID == $lesson->lesson_ID)
                        @if($status->status == 1)   
                        ✓ 
                        @endif()
                        </a>
                        </td>
                        @endif()
                @endforeach

            </tr>
            @endforeach
            </table>
        @endif
        <br><br>
	</div>

	<br><br>


	<br><br>