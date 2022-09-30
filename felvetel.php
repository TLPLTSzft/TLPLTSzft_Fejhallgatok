<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fejhallgatók</title>
</head>

<body>
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
  <h1>Fejhallgatók felvétele</h1>
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
    <input type="checkbox" name="keszleten" id="keszleten_input">
    <label for="keszleten_input">Készleten</label>
    <br>
    <label for="ar_input">Ár:</label>
    <input type="number" name="ar" id="ar_input" placeholder="Ár">
    <br>
  </form>
</body>

</html>