<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>

    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }
        .margin {
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-right margin" style="padding-left: 200px;padding-right: 200px;">    
                <button id="btn_insert" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#insert">เพิ่มข้อมูล</button>        
            </div>    
        </div>
    </div>
    <!-- modal form insert -->
    <div class="modal" id="insert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">ชื่อ</label>
                        <input id="frist_name" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">นามสกุล</label>
                        <input id="last_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button id="btn_save" type="button" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
    </div>
    </div>

    <!-- modal form_update -->
    <div class="modal" id="update" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="form_update" class="modal-body"></div> <!-- ดึงข้อมูลมาจากอีกไฟล์ ใส่ตรงนี้ -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button id="btn_update" type="button" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
    </div>
    </div>

<!-- table -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding-left: 200px;padding-right: 200px;">    
                <div id="table"></div>        
            </div>    
        </div>
    </div>

    <script>
        function delete1(id) {        
            $.ajax({
                method: 'POST',
                url: "process_delete.php",
                data: { 
                        id: id
                    },
                success: function(res) { 
                    $('#table').html(res);
                }
            })
        }

        function update(id) {
            // console.log('hello')        
            $.ajax({
                method: 'POST',
                url: "process_select_datas_for_update.php",
                data: { 
                        id: id
                    },
                success: function(res) { 
                    $('#form_update').html(res);
                }
            })
        }
        
        $(document).ready(function() {
            $.ajax({
                url: "process_select.php",
                success: function(res) { 
                    $('#table').html(res);
                }
            })

            $("#btn_save").click(function() {
                var last_name = $('#last_name').val();
                var frist_name = $('#frist_name').val();
                var email = $('#email').val();
                $.ajax({
                    method: 'POST',
                    url: "process_insert.php",
                    data: { 
                            last_name: last_name,
                            frist_name: frist_name,
                            email: email
                        },
                    success: function(res) {
                        $('#table').html(res);
                    }
                })
            })

            $("#btn_update").click(function() {
                var last_name = $('#last_name_update').val();
                var frist_name = $('#frist_name_update').val();
                var email = $('#email_update').val();
                var id = $('#id').val();

                $.ajax({
                    method: 'POST',
                    url: "process_update.php",
                    data: { 
                            last_name: last_name,
                            frist_name: frist_name,
                            email: email,
                            id: id
                        },
                    success: function(res) {
                        $('#table').html(res);
                    }
                })
            }) 
        });
    </script>
</body>
</html>