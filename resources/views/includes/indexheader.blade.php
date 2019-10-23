<html>
<head>

<style>
body {margin:0;}
body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%;
            vertical-align: middle;}
        .bgimg {
            /* background-image: url('/sourceimages/background.jpg'); */
            /* background-color: #dd3e54; */
            background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #191654, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #191654, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
        input[type=text], select {
            width: 80%;
            opacity: 0.6;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=password], select {
            width: 80%;
            opacity: 0.6;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button {
          background-color:transparent;
	-moz-border-radius:30px;
	-webkit-border-radius:30px;
	border-radius:30px;
	border:1px solid #ffffff;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	font-weight:bold;
	padding:16px 31px;
	text-decoration:none;
	/* text-shadow:0px 1px 0px #a19ca1; */
        }

        .button:hover {background-color:transparent;}
        .button:active {
	position:relative;
	top:1px;
}

        

/* ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #654ea3;
    position: fixed;
    top: 0;
    width: 100%;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #654ea3;
}

.active {
    background-color:#654ea3;
} */
img {
  border-radius: 50%;
}

.navbar {
  width: 100%;
  /* background-color: #191654; */
  background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #191654, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #191654, #43C6AC); 
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>
</head>
<body>

<!-- <ul>
  <li><a href="http://localhost:8000/" class="header-link"><b>Phlaven</b></a></a></li>
  <li> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </li>
 
  <li><a href="http://localhost:8000/register" class="header-link">Register</a></li>
  <li><a href="http://localhost:8000/login" class="header-link">Login</a></li>
  
</ul> -->
<div style="height:7.5%">
<div class="navbar"> 
  <a href="http://localhost:8000/">PHLAVEN</a> 
  <!-- <a href="#"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>  -->
  
  <a href="http://localhost:8000/login"><img src="\sourceimages\log.png"> Login</a>
</div>
</div>

