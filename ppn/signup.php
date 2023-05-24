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
                    <h5 class="card-title">SIGNUP</h5>
                    <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="alert alert-danger" role="alert">
                        ' . $_GET['error'] . ' !' . '
                      </div>';
                    } ?>
                    <form action="signup_api.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">User Name</label>
                                <input class="form-control form-control-sm" type="text" name="user_name" id="user_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Mobile No</label>
                                <input class="form-control form-control-sm" type="text" name="mobile_no" id="mobile_no">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input class="form-control" id="password" name="password" type="password">
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="role" value="user">
                            <div class="col-sm-12" id="book">
                                <button type="submit" id="book-seat" class="btn btn-primary btn-sm text-end" style="margin-top: 30px;">Signup</button>
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