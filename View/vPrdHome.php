
    <?php
    include_once("Controller/cProduct.php");
    $p = new controlProduct();
    $tblProduct = $p->GetAllProduct();
    if ($tblProduct) {
        if (mysqli_num_rows($tblProduct) > 0) {
            $dem = 0;
            echo "<table>";
            while ($row = mysqli_fetch_assoc($tblProduct)) {
                if ($dem == 0) {
                    echo "<tr>";
                }
                echo "<td style='width: 25%;'>";
                echo "<table>";
                echo "<tr>";
                echo "<td>";
                echo "<img width = '100px' height='100px' src='image/" . $row['hinh'] . "'/>";
                echo "</td>";
                echo "<td>";
                echo "<br><b>" . $row['tensanpham'] . "</b><br>" . $row['mota'] . "<br>Giá : " . $row['giamgia'] . " USD" . "<br><s>" . $row['gia'] . " USD</s>";
                echo "</td>";
                echo "<tr>";
                echo "</table>";
                echo "</td>";
                $dem++;
                if ($dem % 2 == 0) {
                    echo "</tr>";
                    $dem == 0;
                }
            }
            echo "</table>";
        } else {
            echo "0 result";
        }
    } else {
        echo "Không có dữ liệu";
    }
    ?>
