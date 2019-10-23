<html>
<head><title>Phlaven</title>
</head>
@include('styles.style')
@include('styles.jquery')
<body>
@include('includes.revieweeheader')
    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white" style="color:black">
    
	<br><br><br>
    <center>
    <div style="background-color: white; width: 50%;border-radius: 25px;">
    <br> <br>
    @if($user->gender == "Male")
    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:200px">
    @endif()
    @if($user->gender == "Female")
    <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" style="width:200px">
    @endif()
		<h1>{{$user->firstname}} {{$user->lastname}}
		</h1>
        <br>
        <table class="aligned-to-center" style="color:black;width:20%">
            <tr>
                <td style="text-align:left" class="formname"> <h3>Gender:</td>
                <td style="text-align:center"><h4> {{$user->gender}}</td>
            </tr>
            <tr>
                <td style="text-align:left" class="formname"><h3>Email:</td>
                <td style="text-align:center"><h4>{{$user->email}}</td>
            </tr>
            <tr>
                <td style="text-align:left" class="formname"><h3>Review Centers:</td>
                <td style="text-align:center"><h4>
                @foreach($revcenters as $revcenter)
                    {{$revcenter->revcenter->revcenter_name}}<br>
                @endforeach()<br>
                <a href="/reviewee/addRevCenter">+ Add RevCenter</a></h4></td>
            </tr>
        </table>    </div>
        <br><br><br>
        <div div style=" background-color: white; border-radius: 25px;">
        <br>
        @include('includes.progresschart')
        </div>
        <br><br>
    </div>
</nav>
<div>
</body>
</html>