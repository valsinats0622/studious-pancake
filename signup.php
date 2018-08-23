
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <script type="text/javascript"> 
    $(document).ready(function(){
      
        $(document).on("click","#submitbtn", function(sub) {
            sub.preventDefault();
            var pwd1     = $("#exampleInputPassword1").val();      
            var pwd2     = $("#exampleInputPassword2").val();     
            var userName = $("#validationServerUsername").val();
            var email    = $("#exampleInputEmail1").val();

            if(pwd1 != pwd2) {
              alert("Passwords are not the same!");
              $("#exampleInputPassword1").val("");
              $("#exampleInputPassword2").val("");
              return false;
            }

            $("#loader2").load("/redemption/filters/nameTaken.php", {"data" : userName}, function(e){
                console.log(e);
                if (e != 0) { 
                    alert("This username is taken!");
                    $("#validationServerUsername").val("");
                    return false;
                }                
            });

            $("#loader2").load("/redemption/filters/uniqueMail.php", {"data" : email}, function(e2){
                if (e2 != 0) { 
                    alert("This email is taken!");
                    $("#exampleInputEmail1").val("");
                    return false;
                } else {
                    $("#theform").submit();
                    return true;
                }
            });
        });
    });         
  </script>

<div class="nav-bar" style="float: right;">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link active" href="/redemption/signup/signup.php">Sign up</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/redemption/index.php">Log In</a>
    </li>
  </ul>
</div>

<form id="theform" action="/redemption/signup/signupScript.php" style="float: right;" class="col-md-6" method="POST">
   <div style="margin-top: 10%; margin-left: 30%;">
    <h2>Sign Up</h2><br>
    <div class="col-md-8 mb-3">
      <label for="validationServer01">First name</label>
      <input type="text" class="form-control" id="validationServer01" placeholder="First name" name="first" required>
    </div>
    <div class="col-md-8 mb-3">
      <label for="validationServer02">Last name</label>
      <input type="text" class="form-control" id="validationServer02" placeholder="Last name" name="last" required>
    </div>
    <div class="col-md-8 mb-3">
      <label for="validationServerUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
        </div>
        <input type="text" class="form-control userName" id="validationServerUsername" placeholder="Username" name="userName" aria-describedby="inputGroupPrepend3" required>
      </div>
    </div>
    <div class="col-md-8 mb-3">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
      </div>
    </div>
    <div class="col-md-8 mb-3">
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control pwd1" id="exampleInputPassword1" placeholder="Password" name="pwd" required>
      </div>
    </div>
    <div class="col-md-8 mb-3">
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control pwd2" id="exampleInputPassword2" placeholder="Password" name="pwd2" required>
      </div>
    </div>
  <button id="submitbtn" class="btn btn-primary" type="submit">Sign Up</button> 
  </div>
</form>

<div style="display: none;" id="loader2"></div>