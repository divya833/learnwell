<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'COURSES - PUBLISHED';
$filter = 1;
if (isset($_GET['filter'])) {
    if ($_GET['filter'] == 0) {
        $title = 'COURSES - NOT PUBLISHED';
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
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Language</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $db->prepare("SELECT * FROM courses WHERE status = '$filter'");
                                $qry->execute();
                                for ($i = 0; $rows = $qry->fetch(); $i++) {
                                    $qryIn = $db->prepare("SELECT * FROM courses_doubts WHERE course = '" . $rows['token'] . "'");
                                    $qryIn->execute();
                                    $count = $qryIn->rowCount();

                                    $qry2 = $db->prepare("SELECT * FROM courses_opted WHERE course = '" . $rows['token'] . "'");
                                    $qry2->execute();
                                    $enrolled = $qry2->rowCount();
                                ?>
                                    <tr>
                                        <td><?php echo ucwords($rows['category']) ?></td>
                                        <td><?php echo ucfirst($rows['title']) ?></td>
                                        <td><?php echo ucfirst($rows['language']) ?></td>
                                        <td><?php echo "INR " . number_format($rows['price'], 2) ?></td>
                                        <td>
                                            <?php
                                            if ($rows['status'] == 1) {
                                                echo '<span class="btn btn-success btn-lg">PUBLISHED</span>';
                                            } else {
                                                echo '<span class="btn btn-danger btn-lg">NOT PUBLSIHED</span>';
                                            } ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="course-update.php?token=<?php echo $rows['token']; ?>" class="btn btn-success btn-lg">MANAGE</a>
                                                <a href="doubts.php?token=<?php echo $rows['token']; ?>" class="btn btn-success btn-lg">
                                                    VIEW <?php echo $count ?> DOUBTS
                                                </a>
                                                <a href="course-students.php?token=<?php echo $rows['token']; ?>" class="btn btn-primary btn-lg">VIEW <?php echo $enrolled ?> STUDENTS</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Language</th>
                                    <th>Price</th>
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