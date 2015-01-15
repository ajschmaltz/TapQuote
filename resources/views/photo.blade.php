<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body {
      margin: 0;
      font-family: sans-serif;
    }
    #container {
      border-top: 5px solid #E87C3C;
      border-bottom: 5px solid #E87C3C;
    }
    .padding{
      padding: 0 20px;
    }
  </style>
</head>
<body>
<div id="container">
  <img src="{{ $photo->src}}" />
  <div class="padding">
    <p>{{ $photo->caption }}</p>
  </div>
</div>

</body>
</html>