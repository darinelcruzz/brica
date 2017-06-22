<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <h1>Victor</h1>
  @foreach($data as $key => $value)
    {{ $key }} , {{ $value }}
    @endforeach
</body>
</html>
