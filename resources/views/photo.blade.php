<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body {
      margin: 0;
      font-family: sans-serif;
    }
    img {
      vertical-align: middle;
    }
    #container {
      border-top: 5px solid #E87C3C;
      border-bottom: 5px solid #E87C3C;
    }
    #logo {
      font-size: 24px;
    }
    #logo img{
      width: 50px;
      height: 50px;
    }
    .orange{
      color: #E87C3C;
    }
    .padding{
      padding: 20px;
      background-color: #eee;
    }
  </style>
</head>
<body>
<div id="container">
  <div id="logo" class="padding">
    <img id="logo" src="/icon.png" /> <strong>TAP</strong><span class="orange">QUOTE</span>
  </div>
  <img src="{{ $photo->src}}" />
  <div class="padding">
    <span>{{ $photo->caption }}</span>
  </div>
</div>

</body>
</html>