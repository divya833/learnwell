<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'FACULTIES - ACTIVE';
$filter = 1;
if (isset($_GET['filter'])) {
    if ($_GET['filter'] == 0) {
        $title = 'FACULTIES - BLOCKED';
        $filter = 0;
    }
}
?>
<!doctype html>
<html class="no-js" lang="">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?> | LEARN WELL ADMIN PANEL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="datatable/jquery.dataTables.min.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper bg-ash">
        <?php include("include/header.php"); ?>
        <div class="dashboard-page-one">
            <?php include("include/sidebar.php"); ?>
            <div class="dashboard-content-one">
                <div class="breadcrumbs-area">
                </div>
                <div class="row gutters-20">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Since</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $db->prepare("SELECT * FROM users WHERE user_type = 'faculty' AND status = '$filter'");
                                $qry->execute();
                                for ($i = 0; $rows = $qry->fetch(); $i++) {
                                    $qry_faculty = $db->prepare("SELECT * FROM faculties WHERE token = '" . $rows['token'] . "'");
                                    $qry_faculty->execute();
                                    $rows_faculty = $qry_faculty->fetch();
                                ?>
                                    <tr>
                                        <td><?php echo ucwords($rows['name']) ?></td>
                                        <td>
                                            <?php
                                            echo $rows['email'];
                                            if ($rows['status'] != 2) {
                                                echo "<br>" . $rows['password'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo ucwords($rows_faculty['designation']) ?></td>
                                        <td><?php echo date_convert($rows['created_at']) ?></td>
                                        <td>
                                            <?php
                                            if ($rows['status'] == 1) {
                                                echo '<span class="btn btn-success btn-lg">ACTIVE</span>';
                                                $status = '<a href="actions/faculty-status.php?token=' . $rows['token'] . '&status=0" class="btn btn-danger btn-lg">BLOCK</a>';
                                            } else {
                                                echo '<span class="btn btn-danger btn-lg">BLOCKED</span>';
                                                $status = '<a href="actions/faculty-status.php?token=' . $rows['token'] . '&status=1" class="btn btn-success btn-lg">UNBLOCK</a>';
                                            } ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <?php echo $status ?>
                                                <a href="faculty-update.php?token=<?php echo $rows['token'] ?>" class="btn btn-primary btn-lg">EDIT</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Link</th>
                                    <th>Shor Description</th>
                                    <th>Created At</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/plugins.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>