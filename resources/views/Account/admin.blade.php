<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1 class="textHeader" style="text-align: center; font-size: 50px;">Thông tin Admin</h1>
    <div class="tab-display">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Avatar</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Edit
                        </button>
                        <a onclick="confirm('bạn có đồng ý xóa ?')" href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thay đổi thông tin Admin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="them.php" method="post">
                        <label for="name">Họ và tên:</label>
                        <input type="text" placeholder="Nhập họ và tên" name="name" id="name" class="form-control">
                        <label for="address">Ngày sinh:</label>
                        <input type="date" name="birthday" id="birthday" class="form-control">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" placeholder="Nhập địa chỉ" name="address" id="address" class="form-control">
                        <label for="address">Số điện thoại:</label>
                        <input type="text" placeholder="Nhập số điện thoại" name="address" id="phone" class="form-control">
                        <label for="email">Nhập Email:</label>
                        <input type="email" class="form-control" placeholder="Nhập email" id="email" name="email">
                        <label for="pwd">Avatar:</label>
                        <br>
                        <input type="file" id="avatar" name="avatar">
                        <br>
                        <button type="submit" name='btn_submit' class="btn btn-primary" style="margin-top: 20px;">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
</body>

</html>