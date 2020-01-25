<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="418441252685-mmg5ud5krcs1uihgbv9j3r3gikoebgor.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <style type="text/css">
      #body{
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <div id="body">
      <div id="email"></div>
    <form enctype="multipart/form-data" id="testform">
  Name <input type="text" name="uname" required="required"><br><br>
  Quantity <input type="text" name="quantity" required="required"><br><br>
  Price <input type="text" name="price" required="required"><br><br>
  Category <select id="cat" name="cat" required="required">
    <option value="">Select Category</option>
  </select><br><br>
  Sub Category <select id="subcat" name="subcat" required="required">
    <option value="">Select Sub-Category</option>
  </select><br><br>
  Images <input type="file" name="images[]" id="images" multiple required="required"><br><br>
  <input type="submit" name="submit" value="submit">
</form>
<br><br>
<b><a href="list.php">LIST</a></b><br><br><br>

<button id="signout" onclick="signout()">SIGN OUT</button>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="imp.js"></script>
<script type="text/javascript">
  $("#cat").change(function(){
    var category = $(this).val();
    getSubcat(category);
  })
  $("#testform").submit(function(e){
    validation(this);
    e.preventDefault();
    var formdata = new FormData(this);
    formdata.append("uname", $("input[name='uname']").val());
    formdata.append("quantity", $("input[name='quantity']").val());
    formdata.append("price", $("input[name='price']").val());
    formdata.append("cat", $("select[name='cat']").val());
    formdata.append("subcat", $("select[name='subcat']").val());
    formdata.append("ins", 1);


    var totalfiles = document.getElementById('images').files.length;
    for(var index = 0; index<totalfiles; index++){
      console.log($('#images')[0]);
      formdata.append("images[]", index);
    }
    submitForm(formdata);
  })
</script>

    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        // console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        // console.log('Full Name: ' + profile.getName());
        // console.log('Given Name: ' + profile.getGivenName());
        // console.log('Family Name: ' + profile.getFamilyName());
        // console.log("Image URL: " + profile.getImageUrl());
        // console.log("Email: " + profile.getEmail());
        $(".g-signin2").css("display", "none");
        $("#body").css("display", "block");
        $("#email").text(profile.getEmail());
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;


        // $.ajax({
        //   data:id_token,
        //   type: 'post',
        //   url:"call.php",
        //   success: function(response){
        //     console.log(response);
        //   }

        // });
      }
      function signout(){
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function(){
          alert("You have been succcessfully signed out!");
          $(".g-signin2").css("display", "block");
          $("#body").css("display", "none");
        })
      }
    </script>
  </body>
</html>