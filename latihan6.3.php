<?php

$data = [
    ["nama" => "Yessy","nilai"=>80],
    ["nama" => "Zidan","nilai"=>90],
    ["nama" => "Ani","nilai" =>70]
];

echo "<table border='1'>";
echo "<tr><th>Nama</th><th>Nilai</th></th>";

foreach ($data as $d) {
    echo "<tr>";
    echo "<td>".$d["nama"]."</td>";
    echo "<td>".$d["nilai"]."</td>";
    echo "</tr>";

}

echo "</tables>";

?>