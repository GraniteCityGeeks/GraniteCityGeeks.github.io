<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-16">
    <meta name="test site">
    <title>Health Page</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
  <style>
      body{
          padding:10px 10px 10px 10px;
          text-align: center;
      }
      a{
          text-decoration: none;
      }
      #nav{
          overflow: hidden;
          text-align:center;
          padding:0px 0px 0px 0px;
          border-bottom:1px solid #000;
      }
      #nav a{
          font-size:20px;
          padding:10px 20px 10px 10px;
          color:#000;
          font-weight:bold;
          cursor:pointer;
          display: inline-block;
      }
      #header-h{
          text-align: center;
      }
  </style>

  <div id="nav">
      <a href="http://gcg.azurewebsites.net/">HOME</a>
      <a href="http://gcg.azurewebsites.net/maps">MAPS</a>
      <a href="http://gcg.azurewebsites.net/ClubWeb">CLUBS</a>
      <a href="http://gcg.azurewebsites.net/healthpages/health.php">HEALTH</a>
  </div>
<h1>Add article to health pages.</h1>
<br>
<form method="post" action="create_health.php">
    <input type="text" name="title" placeholder="title"/></br>
  <textarea name="text" placeholder="text"></textarea></br>
  <input type="submit" name="submit"/>
</form>
</body>

</html>
