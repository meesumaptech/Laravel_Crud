<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="/formpost" method="post">
        @csrf
        <label for="">Name</label>
        <input type="text" name="txtname"><br>

        <label for="">Email</label>
        <input type="text" name="txtemail"><br>

        <label for="">Password</label>
        <input type="password" name="txtpass"><br>

        <input type="submit" name="btnsub">
    </form>
    @if (Session::has("success"))
        <h1>Successfully Submitted</h1>
    @endif
    
    @if (Session::has("fail"))
        <h1>Error In Submitting Form</h1>
    @endif

</body>
</html>