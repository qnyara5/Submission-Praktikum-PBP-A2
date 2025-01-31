<!-- Nama       : Tiara Fitra Ramadhani Siregar
     Nim        : 24060121120008
     Tanggal    : 25 September 2023
     Lab        : PBP A2
 -->
 
<?php include('./header.php') ?>
<div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            
            // TODO 1: Buat koneksi dengan database
            require_once('./lib/db_login.php');

            // TODO 2: Tulis dan eksekusi query ke database
            $query = "SELECT isbn AS ISBN, author AS Author, title AS Title, price AS Price FROM books ORDER BY isbn";
            $result = $db->query($query);
            if(!$result){
                die("Could not connect to database: <br />". $db->error."<br>Query: ".$query);
            }

            // TODO 3: Parsing data yang diterima dari database ke halaman HTML/PHP
            $i = 1;
            while ($row = $result->fetch_object()){
                echo '<tr>';
                echo '<td>'.$row->ISBN.'</td>';
                echo '<td>'.$row->Author.'</td>';
                echo '<td>'.$row->Title.'</td>';
                echo '<td>'.$row->Price.'</td>';
                echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id='.$row->ISBN.'">Add to Cart</a>&nbsp;&nbsp;
                        </td>';
                echo '</tr>';
                $i++;
            }
            echo '</table>';
            echo '<br />';
            echo 'Total Rows = '.$result->num_rows;
            // TODO 4: Lakukan dealokasi variabel $result
            $result->free();

            // TODO 5: Tutup koneksi dengan database
            $db->close();
            ?>
        </table>
    </div>
</div>
<?php include('./footer.php') ?>

