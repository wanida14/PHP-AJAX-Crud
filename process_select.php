<?php
    require('connect.php'); // เรียกใช้ไฟล์...
    mysqli_set_charset($conn, "utf8");

    $sql = "SELECT * FROM crud";
    $result = mysqli_query($conn, $sql);
    
    $htmlRender = '<table class="table text-center">
                    <thead>
                        <tr>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>E-maiil</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>';
    while ($row = mysqli_fetch_array($result)) {
    $htmlRender .= '<tr>
                        <td>' . $row['frist_name'] . '</td>
                        <td>' . $row['last_name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" onclick="update(' .$row['id'] . ');" data-toggle="modal" data-target="#update">แก้ไข</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" onclick="delete1(' .$row['id'] . ');">ลบ</button>
                        </td>
                    </tr>';     
    }
    $htmlRender .= '</tbody></table>';
    
    echo $htmlRender;       
?>
