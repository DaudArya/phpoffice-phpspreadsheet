<?php  
	include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Form Pendaftaran Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Data Siswa</h2>
                        <a href="FormPendaftaran.php" class="btn btn-success pull-right">Daftar</a>
                    </div>
                    <?php
                    // menjalankan koneksi ke database
                    require_once "config.php";

                    // menampilkan hasil query ke dalam form tabel website
                    $sql = "SELECT * FROM peserta";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#ID</th>"; // memberikan judul pada tabel ID
                                        echo "<th>Nama</th>"; //memberikan judul pada tabel nama
                                        echo "<th>Email</th>"; //memberikan judul pada tabel email
                                        echo "<th>NISN</th>"; //memberikan judul pada tabel email
                                        echo "<th>NIK</th>"; //memberikan judul pada tabel email
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>"; //memanggil id user yang telah ada di database
                                        echo "<td>" . $row['namalengkap'] . "</td>"; //memanggil nama user yang telah ada di database
                                        echo "<td>" . $row['email'] . "</td>"; //memanggil email user yang telah ada didatabse
                                        echo "<td>" . $row['nisn'] . "</td>"; //memanggil alamt user yang telah ada di database
                                        echo "<td>" . $row['nik'] . "</td>"; //memanggil alamt user yang telah ada di database
                                        echo "<td>";
                                            
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
            <p><a href="reportsiswabaru.php" class="btn btn-primary">Export</a></p>
        </div>   
    </div>
</body>
</html>