<?php
include 'config.php';
include 'header.php';
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php?error=You are not authorized to access this page');
}
?>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            buttons: [
                'colvis', 'excel', 'pdf', 'print', 'copy'
            ]
        });
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <form action="admin.php" method="GET">
                <label for="date">Date</label>
                <input type="date" id="date" class="form-control" name="date" value="<?php if (isset($_GET['date'])) {
                                                                                            echo $_GET['date'];
                                                                                        } else {
                                                                                            echo date('Y-m-d');
                                                                                        } ?>">
        </div>
        <div class="col-2">
            <label for="from">From</label>
            <select class="form-control" id="from" name="from">
                <option value="jaffna" <?php if ($_GET['from'] == 'jaffna') {
                                            echo "selected";
                                        } ?>>JAFFNA</option>
                <option value="colombo" <?php if ($_GET['from'] == 'colombo') {
                                            echo "selected";
                                        } ?>>COLOMBO</option>
            </select>
        </div>
        <div class="col-2">
            <label for="to">To</label>
            <select class="form-control" id="to" name="to">
                <option value="colombo" <?php if ($_GET['to'] == 'colombo') {
                                            echo "selected";
                                        } ?>>COLOMBO</option>{
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ]
                }
                <option value="jaffna" <?php if ($_GET['to'] == 'jaffna') {
                                            echo "selected";
                                        } ?>>JAFFNA</option>
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
        </div>
        </form>
        <div class="col-2">
            <form action="admin.php" method="GET">
                <input type="hidden" name="all" value="all">
                <button type="submit" class="btn btn-primary" style="margin-top: 30px;">ALL</button>
            </form>
        </div>
        <div class="">
            <table class="table table-striped table-hover " id="example">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Seat No</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['all'])) {
                        $sql = "SELECT * FROM booking";
                    } else {
                        if (isset($_GET['date'])) {
                            $date = $_GET['date'];
                        } else {
                            $date = date('Y-m-d');
                        }
                        $from = $_GET['from'];
                        $to = $_GET['to'];
                        $sql = "SELECT * FROM booking WHERE `date` = '$date' AND `from` = '$from' AND `to` = '$to'";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['booking_seat']; ?></td>
                                <td><?php echo $row['mobile_no']; ?></td>
                                <td><?php echo $row['from']; ?></td>
                                <td><?php echo $row['to']; ?></td>
                                <td><?php echo $row['payment']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>