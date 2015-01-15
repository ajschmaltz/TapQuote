<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body {
      font-size: 24px;
      background-color: #ccc;
      font-family: sans-serif;
      margin: 0;
    }
    #rfq {
      padding: 25px 0;
      width: 500px;
      text-align: center;
      margin: 25px;
      background-color: #fff;
      box-shadow: 0 0 5px #000;
    }
    .padded {
      padding: 0 25px;
    }
  </style>
</head>
<body>
  <div id="rfq">
    <div class="padded">
      <h1>Request for Quote</h1>
    </div>
    @foreach(explode(',', $project->photos) as $photo)
      <img src="{{ $photo }}" />
      <div class="padded">
        <p>{{ $project->desc }}</p>
      </div>
    @endforeach
  </div>

</body>
</html>