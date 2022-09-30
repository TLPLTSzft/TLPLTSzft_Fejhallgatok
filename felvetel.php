<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fejhallgatók</title>
</head>

<body>

  <h1>Fejhallgatók felvétele</h1>

  <?php
  $szin_lista = [
    '' => "",
    'feher' => "Fehér",
    'sarga' => "Sárga",
    'narancs' => "Narancs",
    'piros' => "Piros",
    'zold' => "Zöld",
    'kek' => "Kék",
    'fekete' => "Fekete",
  ];
  ?>

  <form action="felvetel.php" method="post" name="fejhallgato_felvetel" id="fejhallgato_felvetel">
    <label for="megnevezes_input">Megnevezés:</label>
    <input type="text" name="megnevezes" id="megnevezes_input" placeholder="Megnevezés">
    <br>
    <label>Csatlakozó:</label>
    <input type="radio" name="csatlakozo" id="jack_input" value="jack">
    <label for="jack_input">3,5mm Jack</label>
    <input type="radio" name="csatlakozo" id="usb_input" value="usb">
    <label for="usb_input">USB</label>
    <input type="radio" name="csatlakozo" id="bluetooth_input" value="bluetooth">
    <label for="bluetooth_input">Bluetooth</label>
    <input type="radio" name="csatlakozo" id="wireless_input" value="wireless">
    <label for="wireless_input">Wireless</label>
    <br>
    <label for="szin_input">Szín:</label>
    <select name="szin" id="szin_input">
      <?php foreach ($szin_lista as $key => $value) : ?>
        <option value="<?php echo $key ?>"><?php echo $value ?></option>
      <?php endforeach ?>
    </select>
    <br>
    <label>Hangcsatorna:</label>
    <input type="checkbox" name="hang_1" id="hang_1_input">
    <label for="hang_1_input">1.0</label>
    <input type="checkbox" name="hang_2" id="hang_2_input">
    <label for="hang_2_input">2.0</label>
    <input type="checkbox" name="hang_3" id="hang_3_input">
    <label for="hang_3_input">5.1</label>
    <input type="checkbox" name="hang_4" id="hang_4_input">
    <label for="hang_4_input">7.1</label>
    <br>
    <label for="ar_input">Ár:</label>
    <input type="text" name="ar" id="ar_input" placeholder="Ár">
    <!-- <input type="number" name="ar" id="ar_input" placeholder="Ár"> -->
    <br>
    <button type="reset">Kiürít</button>
    <button type="submit">Felvétel</button>
  </form>

  <?php if (isset($_POST) && !empty($_POST)) { ?>
    <br> <?php echo  var_dump($_POST); ?> <br>
  <?php
    $hiba = "";
    if (!isset($_POST['megnevezes']) || empty($_POST['megnevezes'])) {
      $hiba .= "Megnevezés mező kitöltése kötelező!<br>";
    }
    if (!isset($_POST['csatlakozo']) || empty($_POST['csatlakozo'])) {
      $hiba .= "Csatlakozó kiválasztása kötelező!<br>";
    }
    if (!isset($_POST['szin']) || empty($_POST['szin'])) {
      $hiba .= "Szín kiválasztása kötelező!<br>";
    } else if (!in_array($_POST['szin'], array_keys($szin_lista))) {
      $hiba .= "Színt a legördülő listából kell választani!<br>";
    }
    if (!isset($_POST['hang_1']) && !isset($_POST['hang_2']) && !isset($_POST['hang_3']) && !isset($_POST['hang_4'])) {
      $hiba .= "Hangcsatorna kiválasztása kötelező!<br>";
    }
    if (!isset($_POST['ar']) || empty($_POST['ar'])) {
      $hiba .= "Ár megadása kötelező!<br>";
    } else if (!is_numeric($_POST['ar'])) {
      $hiba .= "Az ár csak szám lehet!<br>";
    } else if (round($_POST['ar']) != $_POST['ar']) {
      $hiba .= "Az ár csak egész szám lehet!<br>";
    } else if ($_POST['ar'] <= 0) {
      $hiba .= "Az ár csak 0-nál nagyobb szám lehet!<br>";
    }
    echo "<br>" . $hiba;
  }
  if ($hiba == "") {
    echo "siker";
  }
  ?>

</body>

</html>