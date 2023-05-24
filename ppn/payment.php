<?php
include 'config.php';
include 'header.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Booking</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="details"></span>
                <br>
                <label for="exampleFormControlInput1" class="form-label">Seat Count</label>
                <select class="form-select form-select-sm" id="seat_count" aria-label=".form-select-sm example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Mobile Number">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="final-book">Book</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">


    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payment</h5>
                    <form action="login_api.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Card Number</label>
                                <input class="form-control form-control-sm" type="text" name="user_name" id="user_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">CVV</label>
                                <input class="form-control" id="password" name="password" type="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" id="book">
                                <button type="button" id="book-seat" class="btn btn-primary btn-sm text-end" style="margin-top: 30px;">Pay</button>
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