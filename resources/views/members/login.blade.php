<!DOCTYPE html>
<head>
</head>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<body>
<form action="{{route('login')}}" method='post'>
{{csrf_field()}}
<table>
<tr>
    <td colspan="2">Member LogIn
    </td>
    <td>
    </td>
</tr>
<tr>
    <td>Username
    </td>
    <td>
    <input type="text" name="username">
    </td>
</tr>
<tr>
    <td> Password
    </td>
    <td>
    <input type="password" name="password">
    </td>
</tr>
<tr>
    <td colspan="2">
    <button type="submit" class="btn btn-primary">Login</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    </td>
    <td>
    </td>
</tr>

</table>


</form>

</body>
