<style>
body {margin:0;}
body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
            /* background-image: url('/sourceimages/background.jpg'); */
            background: #43C6AC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #191654, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #191654, #43C6AC); 
            min-height: 100%;
            background-position: center;
            background-size: cover;
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
            width:80%;
            /* background-color:#4c8caf; */
            background: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); 
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
} */

/* li {
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




<div class="navbar"> 
  <a href="http://localhost:8000/reviewee/home"><img src="\sourceimages\lightbulb.png"> Phlaven</a> 
  <a href="http://localhost:8000/reviewee/learningpath/selection"> <img src="\sourceimages\develop.png"> Learning Path</a>  
  <a href="http://localhost:8000/reviewee/profile"><img src="\sourceimages\lightbulb.png">  Profile</a>
  <a href="http://localhost:8000/logout"><img src="\sourceimages\log.png"> Logout</a>
</div>