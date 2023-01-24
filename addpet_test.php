<?php
require_once 'controllers/authController.php';
include_once 'header.php';
?>

<body>
  <form method="POST" action="addpet_test.php">
    <div class="overlay">
      <div class="container">
        <div class="row">
        </div>
      </div>
    </div>
    <label for="f_pets">Kisállat fajtája:</label>

    <select name="f_pets" id="pets">
      <option value="kutya">Kutya</option>
      <option value="macska">Macska</option>
      <option value="nyul">Nyúl</option>
      <option value="madar">Madár</option>
      <option value="kisemlos">Kisemlős</option>
      <option value="egyeb">Egyéb</option>
    </select>

    <br>
    <br>

    <label for="f_name">Kisállat neve:</label>

    <input type="text" placeholder="például: Buksi" id="f_name" name="f_name">

    <br>
    <br>

    <input type="submit" class="btn btn-primary" id="f_addpet" name="f_addpet" value="Kisállat hozzáadása">

    <br>
    <br>
  </form>
</body>

</html>
<?php
include_once 'footer.php';
?>