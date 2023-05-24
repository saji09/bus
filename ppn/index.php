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
                    <!-- <label for="exampleFormControlInput1" class="form-label">Seat Count</label>
                    <select class="form-select form-select-sm" id="seat_count" aria-label=".form-select-sm example">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select> -->
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
            <div class="col-2"></div>
            <div class="col-8">
                <br>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">BOOK BUS</h5>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="exampleFormControlInput1" class="form-label">Date</label>
                                <input class="form-control form-control-sm" type="date" name="date" id="date">
                            </div>
                            <div class="col-sm-2">
                                <label for="exampleFormControlInput1" class="form-label">Time</label>
                                <select class="form-select form-select-sm" id="time" aria-label=".form-select-sm example">
                                    <option value="8.00 pm">8.00 PM</option>
                                    <option value="9.00 pm">9.00 PM</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="exampleFormControlInput1" class="form-label">From</label>
                                <select class="form-select form-select-sm" id="from" aria-label=".form-select-sm example">
                                    <option value="jaffna">JAFFNA</option>
                                    <option value="colombo">COLOMBO</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="exampleFormControlInput1" class="form-label">To</label>
                                <select class="form-select form-select-sm" id="to" aria-label=".form-select-sm example">
                                    <option value="jaffna">JAFFNA</option>
                                    <option value="colombo" selected>COLOMBO</option>
                                </select>
                            </div>
                            <div class="col-sm-1 d-none" id="seat">
                                <label for="exampleFormControlInput1" class="form-label">Seat No</label>
                                <select class="form-select form-select-sm" id="seat-select" aria-label=".form-select-sm example">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button type="button" id="search" class="btn btn-primary btn-sm" style="margin-top: 30px;">Search</button>
                            </div>
                            <div class="col-sm-1 d-none" id="book">
                                <button type="button" id="book-seat" class="btn btn-primary btn-sm" style="margin-top: 30px;">Book</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>

        </div>
    </div>

    <script>
        //on click of search button send ajax request to check.php
        $('#search').click(function() {
            var date = $('#date').val();
            var time = $('#time').val();
            var from = $('#from').val();
            var to = $('#to').val();
            localStorage.clear();
            localStorage.setItem('date', date);
            localStorage.setItem('time', time);
            localStorage.setItem('from', from);
            localStorage.setItem('to', to);
            $.ajax({
                url: 'check.php',
                type: 'POST',
                data: {
                    date: date,
                    time: time,
                    from: from,
                    to: to
                },
                success: function(response) {
                    //if response is not empty, create a seat chart
                    console.log(response);
                    //trigger a modal with selected date, time, from and to and the seat selection chart
                    if (response != '') {
                        $('#seat').removeClass('d-none');
                        $('#book').removeClass('d-none');
                        var available = JSON.parse(response);
                        var seat = '';
                        for (var i = 0; i < available.length; i++) {
                            seat += '<option value="' + available[i] + '">' + available[i] + '</option>';
                        }
                        $('#seat-select').html(seat);
                    } else {
                        $('#seat').addClass('d-none');
                    }
                }
            });
        });
        //on click of book button trigger a modal with selected date, time, from and to and the seat selection chart
        $('#book-seat').click(function() {
            //print the details in the modal
            var date = localStorage.getItem('date');
            var time = localStorage.getItem('time');
            var from = localStorage.getItem('from');
            var to = localStorage.getItem('to');
            var seat = $('#seat-select').val();
            var details = 'Date: ' + date + '<br>Time: ' + time + '<br>From: ' + from + '<br>To: ' + to + '<br>Seat No: ' + seat;
            $('#details').html(details);
            //open modal
            $('#exampleModal').modal('show');
        });
        //on click of final book button send ajax request to book.php
        $('#final-book').click(function() {
            var date = localStorage.getItem('date');
            var time = localStorage.getItem('time');
            var from = localStorage.getItem('from');
            var to = localStorage.getItem('to');
            var seat = $('#seat-select').val();
            var mobile = $('#mobile').val();
            var seat_count = $('#seat_count').val();
            $.ajax({
                url: 'book.php',
                type: 'POST',
                data: {
                    date: date,
                    time: time,
                    from: from,
                    to: to,
                    seat: seat,
                    mobile: mobile
                },
                success: function(response) {
                    console.log(response);
                    var response = JSON.parse(response);
                    var id = response.id;
                    if (response.text == 'success') {
                        alert('Procceed To Payment');
                        location.href = 'payment.php?id=' + id;
                    } else {
                        alert('Booking Failed');
                    }
                }
            });
        });
    </script>