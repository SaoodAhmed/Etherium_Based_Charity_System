<?php
session_start();
require("../dbConnection.php");

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["btnSubmit"])) {
    $name = $_POST['txtName'];
    $amount = $_POST['txtAmount'];
    $addr = $_POST['txtAddr'];
    $needlyPerson = $_POST['txtNeedy']; // Added the name attribute to the <select>
    $date = $_POST['txtDate'];

    if (!empty($name) && !empty($addr) && !empty($date) && !empty($amount) && !empty($needlyPerson)) {
        mysqli_query($conn, "INSERT INTO campaign VALUES (null, '$name', '$amount', '$addr', '$date', '1', '$needlyPerson')") or die("fail to add campaign");
        echo "<script>alert('Campaign added successfully!')</script>";
    } else {
        echo "<script>alert('Fill all fields!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DOCHAIN</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body style="background:#a7be7a;">
<!-- Navbar -->
<?php include "header.php" ?>
<br>
<div class="container">
    <div class="jumbotron" style="background: rgba(20,54,1,0.6);">
        <h2 class="text-center p-2" style="border-radius:50px;  background: #a7be7a;"> Campaign</h2> <br>
        <div class="row">
            <div class="col-md-4 shadow">
                <br>
                <form method="POST" action="campaign.php">
                    <input type="text" placeholder="Campaign Needer" class="form-control" name="txtName"/>
                    <input type="text" placeholder="Campaign Amount" class="form-control mt-2" name="txtAmount"/>
                    <input type="text" placeholder="Campaign Needer Address" class="form-control mt-2" name="txtAddr"/>
                    <select class="form-control mt-2" name="txtNeedy"> <!-- Added name attribute -->
                        <?php
                        $q = mysqli_query($conn, "select * from needly");
                        while ($rowFetch = mysqli_fetch_array($q)) {
                            $n = $rowFetch['username'];
                            $w = $rowFetch['walletAddress'];
                            ?>
                            <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                        <?php } ?>
                    </select>
                    <input type="date" placeholder="date" class="form-control mt-2" name="txtDate"/>
                    <input type="submit" class="form-control mt-3 btn btn-success" value="Create Campaign" name="btnSubmit"/>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-responsive table-bordered bg-white">
                    <tr>
                        <th style="width:50%;"> Campaign Name </th>
                        <th style="width:50%;"> Campaign Amount </th>
                        <th style="width:50%;"> Campaign Address </th>
                        <th style="width:50%;"> Needy Name </th>
                        <th style="width:50%;"> Campaign Date </th>
                        <th style="width:50%;"> Action </th>
                    </tr>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM campaign");
                    while ($row = mysqli_fetch_array($res)) {
                        $cID = $row['id'];
                        $cName = $row['campaignName'];
                        $cAmount = $row['campaignAmount'];
                        $cAddr = $row['campaignAddress'];
                        $cDate = $row['campaignDate'];
                        $cStatus = $row['campaignStatus'];
                        $cLevel = $row['campaignLevel'];
                        ?>
                        <tr>
                            <td style="width:auto;"> <?php echo $cName; ?></td>
                            <td style="width:auto;"> <?php echo $cAmount; ?></td>
                            <td style="width:auto;"> <?php echo $cAddr; ?></td>
                            <td style="width:auto;"> <?php echo $cLevel; ?></td>
                            <td style="width:auto;"> <?php echo $cDate; ?></td>
                            <td style="width:auto; white-space: nowrap;" class="p-3">
                                <?php if ($cStatus == '0') { ?>
                                    <!-- To either show Enable or disable for the students table -->
                                    <a href="campaignState.php?enable=<?php echo urlencode($cID) ?>"
                                       class="btn btn-success btn- ">Enable</a>
                                <?php } else { ?>
                                    <a href="campaignState.php?disable=<?php echo urlencode($cID) ?>"
                                       class="btn btn-warning btn- ">Disable</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../footer.php"; ?>
</body>
</html>
