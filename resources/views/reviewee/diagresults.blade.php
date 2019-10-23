<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>  
	@include('includes.revieweeheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<br>
<!-- <div class="w3-display-middle"> --><center>

    <div div style=" background-color: white; width: 80%; border-radius: 25px;margin:0 auto">
    <br>
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp; Results</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
			<hr style="width:80%;border-color:#006dcc">
	<br>
	<div class="big-message">
    <table class="aligned-to-center"  style="color:black;width:80%" id="customers">
        <tr style="color:black">
            <td>Lesson</td>
            <td>Score</td>
            <td style="text-align:right">Percentage</td>
        </tr>
        <?php $excemptedlesson[]="";
              $counter=0;
              $excemptstatus = 0;
        ?>

        @foreach($getresults as $result)
            <?php $counter ++; ?>
            <tr style="color:black">
            <td>{{$result->lesson->lesson_name}}</td>
            <td>{{$result->userscore}}/{{$result->perfectscore}}</td>

            @if($result->percentage >= 90)
            <?php $excemptedlesson[$counter]=$result->lesson->lesson_name;
                  $excemptstatus=1;
            ?>
            <td style="color:lime;text-align:right">{{$result->percentage}}%</td>
            @elseif($result->percentage >=60)
            <td style="color:orange;text-align:right">{{$result->percentage}}%</td>
            @else($result->percentage <60)
            <td style="color:red;text-align:right">{{$result->percentage}}%</td>
            @endif
            </tr>
        @endforeach()
            
    </table>
    
    <br><br>
    </div>
    
			<hr style="width:80%;border-color:#006dcc">
    <br><br>
    
        <?php if($excemptstatus==1){?>
            <div div style=" background-color: white; width: 500px; border-radius: 25px;margin:0 auto">
                <h3 style="color:black">For doing excellently in a lesson, you have been excempted in</h3>

                <h1 style="color:black">
                <?php foreach($excemptedlesson as $lesson){
                    echo " ".$lesson."<br>";
                }?>
                </h1>
        <?php } ?>
    <br><br>
    <a href="/reviewee/learningpath/{{$revcenter_ID}}" class="button">Proceed</a>
    </div>

	<br><br>