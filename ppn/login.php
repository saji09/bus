<?php
include 'config.php';
include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">LOGIN</h5>
                    <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="alert alert-danger" role="alert">
                        ' . $_GET['error'] . ' !' . '
                      </div>';
                    }
                    if (isset($_GET['success'])) {
                        echo '<div class="alert alert-success" role="alert">
                        ' . $_GET['success'] . ' !' . '
                      </div>';
                    }
                    ?>
                    <form action="login_api.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">User Name</label>
                                <input class="form-control form-control-sm" type="text" name="user_name" id="user_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input class="form-control" id="password" name="password" type="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" id="book">
                                <button type="button" id="btn-login" class="btn btn-primary btn-sm text-end" style="margin-top: 30px;">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
        </div>

    </div>
</div>
<script>
    $('#btn-login').click(function() {
        var user_name = $('#user_name').val();
        var password = $('#password').val();
        $.ajax({
            url: 'login_api.php',
            type: 'POST',
            data: {
                user_name: user_name,
                password: password
            },
            success: function(data) {
                var data = JSON.parse(data);
                if (data.text == 'success') {
                    alert('Login Success');
                    window.location.href = 'index.php';
                } else if (data.text == 'admin') {
                    window.location.href = 'admin.php';
                } else {
                    alert(data.text);
                }
            }
        })
    })
</script>