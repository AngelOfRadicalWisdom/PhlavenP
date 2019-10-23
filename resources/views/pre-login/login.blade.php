<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Phlaven</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            @include('styles.style')
            @include('styles.jquery')
    <body>
        @include('includes.indexheader')
       
        <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">

<div class="w3-display-middle">

<div div style=" width: 700px; height: 500px; border-radius: 25px;">
<br>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; Welcome to Phlaven!</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <br>

        
       
		
<center>
<div class="w3-text-black">
        <form action="/login/confirm" method="post">
        <?php echo csrf_field() ?>
        <br><br>
		<input type="text" placeholder="username" name="username" size="15" autocomplete="off"><br>
		<input type="password" placeholder="password" name="password" size="35"><br><br>
        <button type="submit" class="button" value="submit">Login</button>
        </form>
        </center>
	</div>	</div> </div></div></div>
    </body>
</html>