<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fejhallgatók</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
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
              <a class="nav-link active" aria-current="page" href="index.php">Fejhallgatók listázása</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="felvetel.php">Fejhallgatók felvétele</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h1>Fejhallgatók listázása</h1>
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
    <table class="table table-striped table-bordered">
      <thead style="text-align: center; vertical-align: middle; background: rgba(0, 255, 0, 10%)">
        <tr>
          <th rowspan="2">#</th>
          <th rowspan="2">Megnevezés</th>
          <th rowspan="2">Csatlakozó</th>
          <th rowspan="2">Szín</th>
          <th colspan="4">Hangcsatorna</th>
          <th rowspan="2">Ár</th>
        </tr>
        <tr>
          <th>1.0</th>
          <th>2.0</th>
          <th>5.1</th>
          <th>7.1</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        $file = fopen("adatok.csv", "r");
        while ($sor = fgets($file)) {
          $i++;
          $adatok = explode(";", trim($sor)); ?>
          <tr>
            <td style="text-align: right;"><?php echo $i ?></td>
            <td><?php echo $adatok[0] ?></td>
            <?php switch ($adatok[1]) {
              case 'jack':
                $adatok[1] = "3,5mm Jack";
                break;
              case 'usb':
                $adatok[1] = "USB";
                break;
              case 'bluetooth':
                $adatok[1] = "Bluetooth";
                break;
              case 'wireless':
                $adatok[1] = "Wireless";
                break;
            }
            ?>
            <td><?php echo $adatok[1] ?></td>
            <td><?php echo $szin_lista[$adatok[2]] ?></td>
            <td style="text-align: center;"><?php echo $adatok[3] ?></td>
            <td style="text-align: center;"><?php echo $adatok[4] ?></td>
            <td style="text-align: center;"><?php echo $adatok[5] ?></td>
            <td style="text-align: center;"><?php echo $adatok[6] ?></td>
            <td style="text-align: right;"><?php echo $adatok[7] ?></td>
          </tr>
        <?php
        }
        fclose($file);
        ?>
      </tbody>
      <tfoot style="text-align: center; vertical-align: middle; background: rgba(0, 255, 0, 10%)">
        <tr>
          <th rowspan="2">#</th>
          <th rowspan="2">Megnevezés</th>
          <th rowspan="2">Csatlakozó</th>
          <th rowspan="2">Szín</th>
          <th>1.0</th>
          <th>2.0</th>
          <th>5.1</th>
          <th>7.1</th>
          <th rowspan="2">Ár</th>
        </tr>
        <tr>
          <th colspan="4">Hangcsatorna</th>
        </tr>
      </tfoot>
    </table>
  </main>
</body>

</html>