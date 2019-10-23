<html>

<head><title>Phlaven</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')

<body>
@include('includes.revieweeheader')
<center>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    <div class="w3-display-middle">
        <div div style=" background-color: white; width: 100%; border-radius: 25px;"><br>
        <h2 class="w3-jumbo w3-animate-top" style="text-align:center">&nbsp; Add Review Centers</h2><br>

        <hr style="width:80%;border-color:#006dcc">
        <form action="<?php echo url('/reviewee/updatereviewcenters')?>" method="POST">
        <?php echo csrf_field() ?>
        <table width="80%" style="margin 0; auto">
            <tr>
                <td style="text-align:left" colspan="2"><h3 style="text-align:center">Review Centers</h3></td>
            </tr>
            <tr>
                <td style="text-align:left" colspan="2">
                    @foreach($revcenters as $revcenter)
                    <?php $foundstatus =0; ?>
                        @foreach($userrevcenters as $row)
                            @if($revcenter->revcenter_ID == $row->revcenter_ID)
                                <?php $foundstatus = 1; ?>
			                    @endif()
                        @endforeach()

                            @if($foundstatus == 0)
                            <input type="checkbox" name="revcenter[]" value="{{$revcenter->revcenter_ID}}">{{$revcenter->revcenter_name}}<br>
                            @endif()
                    @endforeach
		        </td>
            </tr>
        </table>
        <br>
        <button type="submit" class="button">Submit</button>
        </form>
	<br>
    </div>