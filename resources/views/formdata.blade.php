<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Data</title>
</head>
<body>
    <table border="1" style="border-collapse: collapse" width="50%">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach ($objuser as $row)
           <tr>
            <td>{{$sno++}}</td>
            <td>{{$row->username}}</td>
            <td>{{$row->email}}</td>
        </tr> 
        @endforeach
        
    </table>
</body>
</html>