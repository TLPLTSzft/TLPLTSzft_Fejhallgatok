<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fejhallgatók</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function validalas() {
      const megnevezes = document.forms['fejhallgato_felvetel']['megnevezes'].value;
      const csatlakozo = document.forms['fejhallgato_felvetel']['csatlakozo'].value;
      const szin = document.forms['fejhallgato_felvetel']['szin'].value;
      const hang_1 = document.getElementById("hang_1_input");
      const hang_2 = document.getElementById("hang_2_input");
      const hang_3 = document.getElementById("hang_3_input");
      const hang_4 = document.getElementById("hang_4_input");
      const ar = document.forms['fejhallgato_felvetel']['ar'].value;
      if (megnevezes.trim().length == 0) {
        alert("Megnevezés mező kitöltése kötelező!");
        return false;
      }
      if (csatlakozo.trim().length == 0) {
        alert("Csatlakozó kiválasztása kötelező!");
        return false;
      }
      if (szin.trim().length == 0) {
        alert("Szín kiválasztása kötelező!");
        return false;
      }
      if (hang_1.checked == false && hang_2.checked == false && hang_3.checked == false && hang_4.checked == false) {
        alert("Legalább 1 hangcsatorna kiválasztása kötelező!");
        return false;
      }
      if (ar.trim().length == 0) {
        alert("Ár megadása kötelező!");
        return false;
      } else if (isNaN(ar)) {
        alert("Az ár csak szám lehet!");
        return false;
      } else if (ar != parseInt(ar)) {
        alert("Az ár csak egész szám lehet!");
        return false;
      } else if (ar <= 0) {
        alert("Az ár csak 0-nál nagyobb szám lehet!");
        return false;
      }
      return true;
    }
  </script>
</head>

<body>
  <main class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Fejhallgatók</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Fejhallgatók listázása</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="felvetel.php">Fejhallgatók felvétele</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
    <form action="felvetel.php" method="post" name="fejhallgato_felvetel" onsubmit="return validalas();">
      <div class="mb-3">
        <label for="megnevezes_input">Megnevezés:</label>
        <input class="form-control" type="text" name="megnevezes" id="megnevezes_input" placeholder="Megnevezés">
      </div>
      <div class="mb-3">
        <label>Csatlakozó:</label>
        <input class="form-check-input" type="radio" name="csatlakozo" id="jack_input" value="jack">
        <label class="form-check-label" for="jack_input">3,5mm Jack</label>
        <input class="form-check-input" type="radio" name="csatlakozo" id="usb_input" value="usb">
        <label class="form-check-label" for="usb_input">USB</label>
        <input class="form-check-input" type="radio" name="csatlakozo" id="bluetooth_input" value="bluetooth">
        <label class="form-check-label" for="bluetooth_input">Bluetooth</label>
        <input class="form-check-input" type="radio" name="csatlakozo" id="wireless_input" value="wireless">
        <label class="form-check-label" for="wireless_input">Wireless</label>
      </div>
      <div class="mb-3">
        <label for="szin_input">Szín:</label>
        <select class="form-select" name="szin" id="szin_input">
          <?php foreach ($szin_lista as $key => $value) : ?>
            <option value="<?php echo $key ?>"><?php echo $value ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="mb-3">
        <label>Hangcsatorna:</label>
        <input class="form-check-input" type="checkbox" name="hang_1" id="hang_1_input">
        <label class="form-check-label" for="hang_1_input">1.0</label>
        <input class="form-check-input" type="checkbox" name="hang_2" id="hang_2_input">
        <label class="form-check-label" for="hang_2_input">2.0</label>
        <input class="form-check-input" type="checkbox" name="hang_3" id="hang_3_input">
        <label class="form-check-label" for="hang_3_input">5.1</label>
        <input class="form-check-input" type="checkbox" name="hang_4" id="hang_4_input">
        <label class="form-check-label" for="hang_4_input">7.1</label>
      </div>
      <div class="mb-3">
        <label for="ar_input">Ár:</label>
        <input class="form-control" type="text" name="ar" id="ar_input" placeholder="Ár">
        <!-- <input class="form-control" type="number" name="ar" id="ar_input" placeholder="Ár"> -->
      </div>
      <button class="btn btn-outline-danger" type="reset">Kiürít</button>
      <button class="btn btn-outline-secondary" type="submit">Felvétel</button>
    </form>
    <?php if (isset($_POST) && !empty($_POST)) { ?>
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
        $hiba .= "Legalább 1 hangcsatorna kiválasztása kötelező!<br>";
      } else {
        $_POST['hang_1'] = isset($_POST['hang_1']) ? "x" : "-";
        $_POST['hang_2'] = isset($_POST['hang_2']) ? "x" : "-";
        $_POST['hang_3'] = isset($_POST['hang_3']) ? "x" : "-";
        $_POST['hang_4'] = isset($_POST['hang_4']) ? "x" : "-";
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
      // echo var_dump($_POST);
      // echo implode(" : ", $_POST);

      if ($hiba == "") {
        $file = fopen("adatok.csv", "a");
        // $sor = implode(";", $_POST) . PHP_EOL;
        $sor = $_POST['megnevezes'] . ';' . $_POST['csatlakozo'] . ';' . $_POST['szin'] . ';' . $_POST['hang_1'] . ';' . $_POST['hang_2'] . ';' . $_POST['hang_3'] . ';' . $_POST['hang_4'] . ';' . $_POST['ar'] . PHP_EOL;
        fwrite($file, $sor);
        fclose($file); ?>
        <div class="alert alert-success alert-dismissible fade show" role="success">
          <strong>Sikeres felvétel!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } else { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><?php echo $hiba; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
      }
    }
    ?>
  </main>
</body>

</html>