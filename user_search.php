<?php
 session_start();
include "connectdb.php";
$ids = $_GET['id'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
body {
	background-image: url(bg.jpg);
}
div label input {
   margin-right:100px;
}
body {
    font-family:sans-serif;
}
ul.navbar li {
    background: white;
    margin: 0.5em 0;
    padding: 0.3em;
    border-right: 1em solid black }
  ul.navbar a {
    text-decoration: none }
  a:link {
    color: blue }
  a:visited {
    color: purple }

.link_button {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    border: solid 1px #20538D;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #4479BA;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;
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
</head>

<body>
<div align="center">
  <p align="center"><font size = '36' color = 'red'>MUSICALA</font></p>
  <p>&nbsp;</p>
  <p align="center"><font size = "36" color = 'white'>Follow or Visit Profile</font> </p>
  <div align="center">
    <table width="285" height="168" border="1">
      <tbody>
        <tr>
        <form action ="" method = 'POST'>
          <td><label for="search">
            <div align="center">Search</div>
          </label>
            <div align="center">
              <p>
                <input name="text" type="text" id="text" placeholder="fan">
              </p>
              <p>
                <input type="submit" name="submit" id="submit" value="Search">
              </p>
          </div></td>
        </tr>
      </tbody>
      </table>
  </div>
  </form>
  <p>&nbsp;</p>
  <div id = link_button><label>hello</label></div>
       <?php

       $userid = $_SESSION['login_user'];
       $text = $_REQUEST['text'];
       if(!isset($_POST['submit']))

       {
    if ($stmt =$mysqli->prepare("Select userid,fname,lname
    FROM
    user
WHERE
    fname LIKE CONCAT('%".$ids."%') OR lname LIKE CONCAT('%".$ids."%')"))
     {

//execute SQL query
        $stmt->execute();
        $stmt->bind_result($userid_1,$fname,$lname);
        echo "<center>";
        echo "<table border = '1'>\n";
        while ($stmt->fetch()) {
                     $fname = strtoupper($fname);
                      $lname = strtoupper($lname);
echo"<center>";
echo "<tr>";
echo"<form name = 'form1' Method = 'Post'>";
echo "<input type ='hidden' name ='genre[]' value =".$userid_1.">";
echo"<td><img src='img.php?id=".$userid_1."' height='70' width='100'>";
echo "<td><ul><a href='fuser.php?id=".$userid_1."'>$fname $lname</a></ul></td><br/>";
echo"<td><div id='ck-button'><label><input type='checkbox' name='bname[]' value=".$userid_1."><span>Follow</span></label></div>
   </td>";
                     echo "</tr>\n";
		echo "</center>";
        }

        echo "</table>\n";
        	echo"<input type='submit' name='submit2' id = 'submit2' >";
	echo "</center>";
    echo "</form>";


        $stmt->close();


	}
       }
       else{
       if(!empty($_REQUEST['text']))
                            {
    if ($stmt =$mysqli->prepare("Select userid,fname,lname
    FROM
    user
WHERE
    fname LIKE CONCAT('%".$text."%') OR lname LIKE CONCAT('%".$text."%')"))
     {

//execute SQL query
        $stmt->execute();
        $stmt->bind_result($userid_1,$fname,$lname);
        echo "<center>";
        echo "<table border = '1'>\n";
        while ($stmt->fetch()) {
                     $fname = strtoupper($fname);
                      $lname = strtoupper($lname);
echo"<center>";
echo "<tr>";
echo"<form name = 'form1' Method = 'Post'>";
echo "<input type ='hidden' name ='genre[]' value =".$userid_1.">";
echo"<td><img src='img.php?id=".$userid_1."' height='70' width='100'>";
echo "<td><a href='fuser.php?id=".$userid_1."'>$fname $lname</a></td><br/>";
echo"<td><div id='ck-button'><label><input type='checkbox' name='bname[]' value=".$userid_1."><span>Follow</span></label></div>
   </td>";
                     echo "</tr>\n";
		echo "</center>";
        }

        echo "</table>\n";
        	echo"<input type='submit' name='submit2' id = 'submit2' >";
	echo "</center>";
    echo "</form>";


        $stmt->close();


	                    }
                }
                else {
                  echo "Please Enter A NAME";
                }
       }

       if(isset($_POST['submit2']))
            {

              $int = $_POST['bname'];


              for ($i = 0 ; $i<sizeof($int) ; $i++)
              {
                $query = $mysqli->prepare("Insert into friends values('".$userid."','".$bname[$i]."',now())");
                $query->execute();
              }
               header("location:profile.php");
            }
       ?>
</body>

</html>