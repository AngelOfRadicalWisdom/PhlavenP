<!doctype html>
<!-- <style> 
div {
    background-color: red;
    opacity: .5
    ;
    filter: Alpha(opacity=50); /* IE8 and earlier */
}
</style> -->
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>Phlaven</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

        <!-- Styles -->
        @include('styles.style')
        @include('styles.jquery')
    </head>
    <body>
        @include('includes.indexheader')

        <div class="bgimg w3-display-container w3-animate-opacity w3-text-white ">
        <br><br>
        <center>
        <!-- <div div style=" background-color: white; width: 80%; border-radius: 25px;  " ><br> -->
        <img src="\sourceimages\logo.png" height="200" width="400"><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <h1 style="text-align:center">&nbsp; &nbsp; &nbsp; &nbsp;Review Easy,Study Stress Free!</h1><br><br>
    <br>

        <!-- <div class="big-message">
            <h1>Review Easy,<br>Study Stress Free!</h1><br><br> -->
            <center>
            <br>
            <img src="\sourceimages\study.png"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp
            <img src="\sourceimages\presentation.png"><br><br>
            <a href="http://localhost:8000/register" class="button"> Start as Reviewee</a> &nbsp &nbsp
            <a href="http://localhost:8000/adminregister" class="button">Start as Review Center</a>
            </center>
            <br>
        </div>
    </body>
</html>