<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Inform </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  </head>

  <body class="login">
    <div class="container container-login">
      <form action="personality_test.php" method="POST" name="myFormLogin" id="myFormLogin" class="needs-validation" novalidate>
        <div class="form-group has-feedback">
          <center>
            <label class="col-sm-6">Test</label>

            <div class="col-sm-6">
              <button type="submit" class="btn btn-success"> Submit </button>
              <button type="reset" class="btn btn-danger"> Reset </button>
            </div>
          </center>
        </div>
      </form>
    </div>
  </body>
</html>