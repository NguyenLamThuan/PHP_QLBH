<ul class="admin">
    <li class="active">
        <a name="index" href="index.php">Home</a>
    </li>
    <li>
        <a name="admin" href="admin.php">Quản lý sản phẩm</a>
    </li>
    <li style="float:right">
        <?php
        if (isset($_SESSION["login"])) {
            echo '<a href="admin.php?dangxuat">Đăng xuất</a>';
        }
        ?>
    </li>
</ul>