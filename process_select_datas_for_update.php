<?php
    require('connect.php'); // เรียกใช้ไฟล์...
    mysqli_set_charset($conn, "utf8");

    $id  = $_POST['id'];

    $sql = "SELECT * FROM crud WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    
    echo '<form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">ชื่อ</label>
              <input id="frist_name_update" type="text" class="form-control" value="' . $data['frist_name'] . '">
              <input id="id" type="hidden" class="form-control" value="' . $id . '">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">นามสกุล</label>
              <input id="last_name_update" type="text" class="form-control" value="' . $data['last_name'] . '">
            </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">E-mail</label>
            <input type="text" class="form-control" name="email" id="email_update" value="' . $data['email'] . '">
          </div>
        </form>';        

?>
