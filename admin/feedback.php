<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'FEEDBACKS';
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
                                    <th>By</th>
                                    <th>Feedback</th>
                                    <th>Reply</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = $db->prepare("SELECT * FROM feedbacks ORDER BY id DESC");
                                $qry->execute();
                                for ($i = 0; $rows = $qry->fetch(); $i++) {

                                    $qryIn = $db->prepare("SELECT * FROM users WHERE token = '" . $rows['created_by'] . "'");
                                    $qryIn->execute();
                                    $rowsIn = $qryIn->fetch();
                                ?>
                                    <tr>
                                        <td>
                                            <span style="font-weight:bold"> <?php echo ucwords($rowsIn['name']) ?></span><br>
                                            <?php echo ($rowsIn['email']) ?><br>
                                            <?php echo ($rowsIn['contact_no']) ?>
                                        </td>
                                        <td>
                                            <?php echo time_convert($rows['created_at']) ?><br>
                                            Subject: <?php echo $rows['subject'] ?><br>
                                            <span style="font-weight:bold"><?php echo $rows['feedback'] ?></span>
                                        </td>
                                        <td style="vertical-align:bottom"><?php if ($rows['reply'] != '') {
                                                                                echo $rows['reply'];
                                                                            ?>
                                                <br><a href="feedback-reply.php?token=<?php echo $rows['token']; ?>" class="btn btn-primary btn-lg float-right mt-2">VIEW</a>
                                            <?php
                                                                            } else {
                                            ?>
                                                <a href="feedback-reply.php?token=<?php echo $rows['token']; ?>" class="btn btn-primary btn-lg float-right mt-2">REPLY</a>
                                            <?php
                                                                            } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>By</th>
                                    <th>Feedback</th>
                                    <th>Reply</th>
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