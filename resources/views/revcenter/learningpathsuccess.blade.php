<html>
<head><title>Phlaven</title>
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
	<br><br><br><br><br><br>
        
        <form action="<?php echo url('/learningpath/new')?>" method="POST">
		<?php echo csrf_field() ?>
        <div class="big-message">
		<h1>Learning Path Creation was Successful!<br><br></h1>
		</div>
        <a href="http://localhost:8000/revcenter/settings"
    </body>
</html>