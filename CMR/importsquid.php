<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container Data</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      .container-import {
        width: 1380px;
        display: flex;
      }
      table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        font-size: 12px;
        /* border: 1px solid red; */
      }
      th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      th {
        background-color: #f2f2f2;
      }
      .container-month {
        padding: 1rem;
        width: 45%;
        height: auto;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      }
      .january .february .march .april .may .june .july .august .september .october .november .december {
        padding: 2rem;
        width: 20rem;
        height: auto;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      }
      h2 {
        text-align: center;
        background: green;
        border-radius: 1rem;
        height: 2.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      }
      .pink-background {
        background-color: #6549;
      }
    </style>
</head>
<body>
  <div class="container-import">
    <?php
    // Define months
    $months = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];

    // Iterate through months
    foreach ($months as $month) {
      echo "<div class='{$month}'>";
      echo "<h1>{$month}</h1>";

      $containers = [
        array(
          "title" => " Container  (Torlar 3) ",
          "data" => array(
            array("Size" => "Size", "KGS" => "KGS", "ETA" => "ETA"),
            array("Size" => "U3", "KGS" => 800, "ETA" => "2024-01-08"),
            array("Size" => "3/6", "KGS" => 14800, "ETA" => null),
            array("Size" => "6/10", "KGS" => 6000, "ETA" => null),
            array("Size" => "10/15", "KGS" => 2400, "ETA" => null),
          ),
        ),
        array(
          "title" => " Container   (Sanchita 1)   ",
          "data" => array(
            array("Size" => "Size", "KGS" => "KGS", "ETA" => "ETA"),
            array("Size" => "U3", "KGS" => 8000, "ETA" => "2024-01-12"),
            array("Size" => "3/6", "KGS" => 8000, "ETA" => null),
            array("Size" => "6/10", "KGS" => 8000, "ETA" => null),
          ),
        ),
        array(
          "title" => "4th Container (Torlar 4) INDIA",
          "data" => array(
            array("Size" => "Size", "KGS" => "KGS", "ETA" => "ETA"),
            array("Size" => "U3", "KGS" => 440, "ETA" => "2024-01-13"),
            array("Size" => "3/6", "KGS" => 2000, "ETA" => null),
            array("Size" => "6/10", "KGS" => 15000, "ETA" => null),
            array("Size" => "10/15", "KGS" => 6560, "ETA" => null),
          ),
        ),
        array(
          "title" => "5th Container (Torlar 5) INDIA",
          "data" => array(
            array("Size" => "Size", "KGS" => "KGS", "ETA" => "ETA"),
            array("Size" => "U3", "KGS" => 400, "ETA" => "2024-01-25"),
            array("Size" => "3/6", "KGS" => 1000, "ETA" => null),
            array("Size" => "6/10", "KGS" => 13680, "ETA" => null),
            array("Size" => "10/15", "KGS" => 8920, "ETA" => null),
          ),
        ),
      ];

      echo "<table>";
      foreach ($containers as $key => $container) {
        echo "<tr class='pink-background'><td colspan='4'><h2>{$container['title']}</h2></td></tr>";
        foreach ($container['data'] as $row) {
          echo "<tr>";
          echo "<td>{$row['Size']}</td>";
          echo "<td>{$row['KGS']}</td>";
          echo "<td>{$row['ETA']}</td>";
          echo "</tr>";
        }
        // Calculate total KGS for each container
        $totalKGS = array_sum(array_column($container['data'], 'KGS'));
        echo "<tr><td colspan='2'></td><td>Total KGS: {$totalKGS}</td><td></td></tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    ?>
  </div>
</body>
</html>
