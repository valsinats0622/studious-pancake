  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


<div class="nav-bar" style="float: right;">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="/redemption/signup/signup.php">Sign up</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="/redemption/login/userLogIn.php">Log In</a>
    </li>
  </ul>
</div>


<form class="col-md-4" action="/redemption/login/login.php" method="POST" style="margin-bottom: 0px;">
  <div class="form-row align-items-center" style="margin-top: 10% margin-left: 10%;">
    <div class="col-sm-4 my-1">
      <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username" name="uid">
      </div>
    </div>
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inlineFormInputName">Password</label>
      <input type="Password" class="form-control" id="inlineFormInputName" placeholder="Password" name="pwd">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </div>
  <label for="rememberUser" style="margin-bottom: 0px;">Remember Me
  <input type="checkbox" value="true" name="rememeberUser">
  </label>

</form>
  <a href="/redemption/resetPwdFolder/changePwd.php" style="padding-left: 15px; position: absolute;">Forgot Password?</a>
