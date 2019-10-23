<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Phlaven</title>
            @include('styles.style')
            @include('styles.jquery')
    <body>
    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    
        @include('includes.indexheader')
            
        <br><br>
        
        <form action="<?php echo url('/newuser/register')?>" method="POST">
        <?php echo csrf_field() ?>
        
		<!-- <h1>Register for free!<br><br></h1> -->
        <div class="aligned-to-center" style="width: 600px; height: 700px; border-radius: 25px;margin:0 auto">
        <center>
        
        <table width="80%" style="margin 0; auto">
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="text" placeholder="Username" name="username" ></td>
            </tr>
            <tr>
                <td class="formname"></td>
		        <td style="text-align:center"><input type="password" placeholder="Password" name="password"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="password" placeholder="Confirm Password" name="confpassword"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="text" placeholder="First Name" name="fname"></td>
            </tr>
            <tr>
                <td class="formname"></td>
		        <td style="text-align:center"><input type="text" placeholder="Last Name" name="lname"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="text" placeholder="Email Address" name="email"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><Select name="gender" >
                        <option disabled selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </Select>
                </td>
            </tr>
            <tr>
                <td class="formname" colspan="2" style="text-align:center; color:white;">Select a Review Center</td>
            </tr>
            <tr>
                <td style="text-align:center; color:white;" colspan="2">
                    @foreach($revcenters as $revcenter)
			        <input type="checkbox" name="revcenter[]" value="{{$revcenter->revcenter_ID}}">{{$revcenter->revcenter_name}}<br>
                    @endforeach
		        </td>
            </tr>
            <tr>
                <td colspan="2" style="color:red">{{$errormessage}}</td>
            </tr>
            </table>
            </center>
            <br>
		<center><input type="submit" class="button" value="Register"></center>
        
        </form></div>
		<!-- <h6>By signing up, you agree to our terms and conditions</h6> -->
		</h1>
	</div>
    </body>
</html>