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

        .badge{
            position: relative  ;
            background: red;
            color: white;
        }    
        
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=password], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button {
            width:40%;
            background: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            border: none;
            color: white;
            padding: 30px 3px;
            text-align: center;
            font-size: 16px;
            margin: 4px 2px;
            opacity: 0.6;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {opacity: 1}

/* ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #4c8caf;
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
    background-color: #4cafad;
} */

.active {
    background-color: #4cafad;
}
input[type=submit] {
    width: 100%;
    background-color: #444647;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #4c8caf;
}
img {
  border-radius: 50%;
}
table {
    width: 50%;
    font color="white";
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
  <li><a href="http://localhost:8000/revcenter/home" class="header-link"><b>Phlaven</b></a></a></li>
  <li> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </li>
  <li><a href="http://localhost:8000/revcenter/settings/newlearningpath" class="header-link">Learning Path</a></li>
  <li><a href="http://localhost:8000/logout" class="header-link">Logout</a></li>
  
</ul> -->


<div style="height:7.5%">
<div class="navbar"> 
  <a href="http://localhost:8000/revcenter/home"><img src="\sourceimages\lightbulb.png">Phlaven</a> 
  <a href="http://localhost:8000/revcenter/settings/newlearningpath"><img src="\sourceimages\develop.png"> Learning Path <span class ="badge index">!</span></a>  
  <a href="http://localhost:8000/logout"><img src="\sourceimages\log.png">Logout</a>
</div>
</div>