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
            
        
        
        <form action="<?php echo url('/newadmin/register')?>" method="POST">
        <?php echo csrf_field() ?>
        <div class="aligned-to-center" style=" width: 600px; height: 700px; border-radius: 25px;margin:0 auto">
		<!-- <h1>Register for free!<br><br></h1> -->
        <center>
        <br>
        <table width="80%" style="margin 0; auto">
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="text" placeholder="username" name="username"></td>
            </tr>
            <tr>
                <td class="formname"></td>
		        <td style="text-align:center"><input type="password" placeholder="password" name="password"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="password" placeholder="confirm password" name="confpassword"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="text" placeholder="first name" name="fname"></td>
            </tr>
            <tr>
                <td class="formname"></td>
		        <td style="text-align:center"><input type="text" placeholder="last name" name="lname"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="text" placeholder="email" name="email"></td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><Select name="gender" >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </Select>
                </td>
            </tr>
            <tr>
                <td class="formname"></td>
                <td style="text-align:center"><input type="text" placeholder="ReviewCenter" name="revcenter"></td>
            </tr>
            </table></center>
            <br>
            <center>
		<input type="submit" class="button" value="Register"></center>
        </form>
		<!-- <h6>By signing up, you agree to our terms and conditions</h6> -->
		</h1>
	</div>
    </body>
</html>