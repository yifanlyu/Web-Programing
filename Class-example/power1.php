<html>
<head> <title> powers.php </title>
</head>
<body>
  <table border = "border">
    <caption> Powers table </caption>
    <?php
      for ($number = 1; $number <=10; $number++) {
          print("<tr align = 'center'>");
          for ($i=1; $i <=10; $i++) {
             $cur=$i*$number;
             print("<td> $cur </td>");
          }
        print("</tr>\n");
      }
    ?>
  </table>
</body>
</html>
