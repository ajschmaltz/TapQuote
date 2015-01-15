<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body {
      font-size: 40px;
      background-color: #ccc;
      font-family: sans-serif;
    }
    #rfq {
      width: 500px;
      text-align: center;
      margin: 10px auto;
      background-color: #fff;
      padding: 25px;
      box-shadow: 0 0 5px #000;
    }
  </style>
</head>
<body>
  <div id="rfq">
    <h1>Request for Quote</h1>
    @foreach($photos as $photo)
    <img src="{{ $photo }}" />
    <p>This is a caption for the photo!</p>
    @endforeach
  </div>

</body>
</html>