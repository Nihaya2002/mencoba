<?php
    $json = file_get_contents('data.json');
    // Decode the JSON file
    $data = json_decode($json,false);

    function hitung_umur($tanggal_lahir){
        // Create a datetime object using date of birth
        $dob = new DateTime($tanggal_lahir);
        // Get current date
        $now = new DateTime();
        // Calculate the time difference between the two dates
        $diff = $now->diff($dob);
        return $diff->y;
    }

    function konversi_nilai($nilai){
        if($nilai>=90){
            return "A";
        }else if($nilai>=80){
            return "B";
        }else if($nilai>=70){
            return "C";
        }else if($nilai>=60){
            return "D";
        }else if($nilai>=50){
            return "E";
        }else {
            return "F";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Hasil</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < count($data) ; $i++) { ?>
                    <tr>
                        <th><?php echo $i+1 ?></th>
                        <td><?php echo $data[$i]->nama ?></td>
                        <td><?php echo $data[$i]->tanggal_lahir ?></td>
                        <td><?php echo hitung_umur($data[$i]->tanggal_lahir) ?> tahun</td>
                        <td><?php echo $data[$i]->alamat ?></td>
                        <td><?php echo $data[$i]->kelas ?></td>
                        <td><?php echo $data[$i]->nilai ?></td>
                        <td><?php echo konversi_nilai($data[$i]->nilai) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>