<?php
session_start();
include "connectdb.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
div label input {
   margin-right:100px;
}
body {
    font-family:sans-serif;
}

#ck-button {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;
    float:left;
}

#ck-button {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;
    float:left;
}

#ck-button:hover {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid red;
    overflow:auto;
    float:left;
    color:red;
}

#ck-button label {
    float:left;
    width:4.0em;
}

#ck-button label span {
    text-align:center;
    padding:3px 0px;
    display:block;
}

#ck-button label input {
    position:absolute;
    top:-20px;
}

#ck-button input:checked + span {
    background-color:#911;
    color:#fff;
}
</style>
<body>
                 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
body {
	background-image: url(bg.jpg);
}
</style>
</head>

<body>
<div align="center">
  <p>&nbsp;</p>
  <p align="center"><font size = '36' color = 'red'>MUSICALA</font></p>
  <p>&nbsp;</p>
  <p align="center"><font size = "36" color = 'white'>Getting Started: Like your favourite Music</font> </p>
  <div align="center">
    <table width="285" height="168" border="1">
      <tbody>
        <tr>
        <form method = 'POST'>
          <td><label for="search">
            <div align="center">Search</div>
          </label>
            <div align="center">
              <p>
                <input name="text" type="text" id="text" placeholder="genre,band">
              </p>
              <p>
                <input type="submit" name="submit" id="submit" value="Submit">
              </p>
          </div></td>
        </tr>
      </tbody>
      </table>
  </div>
  </form>
  <p>&nbsp;</p>
       <?php
       if (isset($_POST['submit']))
       {
         $_SESSION['search']=$mysqli->real_escape_string($_POST['text']);
         header("location:reg_user3.php");
       }

       $value = $_SESSION['search']

       ?>

<div id="ck-button">
   <label>
      <input type="checkbox" value="1"><span>red</span>
   </label>
   </div>
   <p>&nbsp;</p>
   <div id="ck-button">
   <label>
      <input type="checkbox" value="2"><span>red</span>
   </label>

</div>
<?php
$id = $_SESSION['search'];

     ?>
</body>
</html>