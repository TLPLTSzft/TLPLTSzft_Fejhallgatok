<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fejhallgatók</title>
</head>

<body>

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

  <table>
    <thead>
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
      <tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $file = fopen("adatok.csv", "r");
      while ($sor = fgets($file)) {
        $i++;
        $adatok = explode(";", trim($sor)); ?>
        <tr>
          <td><?php echo $i ?></td>
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
          <td><?php echo $adatok[3] ?></td>
          <td><?php echo $adatok[4] ?></td>
          <td><?php echo $adatok[5] ?></td>
          <td><?php echo $adatok[6] ?></td>
          <td><?php echo $adatok[7] ?></td>
        </tr>
      <?php
      }
      fclose($file);
      ?>
    </tbody>
    <tfoot>

    </tfoot>
  </table>


</body>

</html>