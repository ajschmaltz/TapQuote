<!doctype html>
<html>
<head>
  <title>TapQuote</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <link href="http://static.tapquote.com/icon.svg" rel="icon" sizes="192x192" />
  <link href="http://static.tapquote.com/icon.svg" rel="icon" sizes="128x128" />
  <link rel="stylesheet" type="text/css" href="http://static.tapquote.com/css/all.css">
</head>
<body>

<div id="page">

  <nav>
    <div id="logo">
      <img src="http://static.tapquote.com/icon.svg" />
      <span class="tap">TAP</span><span class="quote">QUOTE</span>
    </div>
  </nav>

  <ul class="tabs">
    <li class="active"><a href="#jobform">Post Job</a></li>
    <li><a href="#howitworks">About</a></li>
    <li><a href="#signup">Pro Sign Up</a></li>
  </ul>

  <div id="form">

    <div class="panel" id="jobform">

      <form id="project_form">

        <div class="form-group">
          <div class="step no-top-margin text-center">
            <span class="a">FIRST</span> | <span class="b">TAKE A PHOTO</span>
            <div class="tip text-center">Take up to 3 photos of your job.</div>
          </div>

          <div id="fine-uploader"></div>
        </div>


        <div class="form-group">
          <div class="step text-center">
            <span class="a">SECOND</span> | <span class="b">SELECT A CATEGORY</span>
          </div>

          <select id="tag" name="project[tag]" tabindex="1" placeholder="SELECT A CATEGORY">
            <option>LAWN / GARDEN</option>
            <option>PAINTING</option>
            <option>PLUMMING</option>
          </select>
        </div>

        <div class="form-group">
          <div class="step text-center">
            <span class="a">THIRD</span> | <span class="b">TYPE A DESCRIPTION</span>
          </div>

          <textarea rows="3" placeholder="DESCRIBE YOUR NEEDS" id="desc" name="project[desc]" tabindex="2" required="required"></textarea>
        </div>

        <div class="form-group">
          <div class="cols">

            <div class="col-left">

              <div class="step text-center">
                <span class="a">FOURTH</span> | <span class="b">LOCATION</span>
              </div>
              <input type="number" id="zip" name="project[zip]" placeholder="ZIP CODE" tabindex="3" maxlength="5" required="required" />

            </div>

            <div class="col-right">

              <div class="step text-center">
                <span class="a">FIFTH</span> | <span class="b">MOBILE #</span>
              </div>
              <input type="number" id="cell" name="project[cell]" placeholder="xxx-xxx-xxxx" tabindex="4" required="required" />

            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="step text-center">
            <span class="a">SIXTH</span> | <span class="b">SUBMIT YOUR PROJECT</span>
          </div>
          <div class="text-center">
            <button tabindex="5">SUBMIT PROJECT</button>
          </div>
        </div>

      </form>

    </div>

    <div class="panel" id="howitworks">

      Explain how it works...

    </div>

    <div class="panel" id="signup">

      <h2>Pro Sign Up <small>$7/month</small></h2>

      <p>Register to receive jobs in your area and expertise.
        You will also have a custom job form that sends leads directly to you
        for no cost at all.</p>

      <form id="pro_form">

        <div class="input-group">
          <label for="name">Business Name</label>
          <input id="pro_name" name="pro[name]" type="text" placeholder="Your Business Name" />
        </div>

        <div class="input-group">
          <label for="zip">Zip Code</label>
          <input id="pro_zip" name="pro[zip]" type="number" placeholder="Zip Code" />
        </div>

        <div class="input-group">
          <label for="name">Phone Number</label>
          <input id="pro_cell" name="pro[cell]" type="text" placeholder="xxx-xxx-xxxx" />
        </div>

        <div class="input-group">
          <label for="name">Categories</label>

          <select name="pro[tag]">
            <option>PLUMMING</option>
          </select>

        </div>

        <div class="input-group">
          <button>BECOME A PRO</button>
        </div>

      </form>



    </div>

  </div>

</div>

<script src="/js/all.js"></script>

<script type="text/template" id="qq-template">
  <div class="qq-uploader-selector qq-uploader">
    <div id="gallery">
          <span class="qq-upload-list-selector qq-upload-list">
            <div class="gallery-item">
              <div class="qq-upload-delete-selector qq-upload-delete">
                <i class="fa fa-times-circle"></i>
              </div>
              <div class="qq-progress-bar-container-selector">
                <div class="progress-bar">
                  <div class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
              </div>
              <img class="qq-thumbnail-selector qq-thumbnail-square" qq-max-size="500" qq-server-scale>
            </div>
          </span>

      <div class="gallery-item qq-upload-button-selector qq-upload-button">
      </div>
    </div>
  </div>
</script>

</body>
</html>