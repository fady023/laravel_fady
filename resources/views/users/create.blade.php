<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create user</title>
</head>
<body>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
      Name :   <input name="name" type="text" > <br>
      Age :   <input name="age" type="number" > <br>
        <button type="submit">Create</button>
    </form>
    
</body>
</html>