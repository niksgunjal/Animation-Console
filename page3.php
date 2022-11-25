<?php
ob_start();
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/TweenMax.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>



<!-- <?php
        echo '<pre>';
        var_dump($_GET);
        echo '</pre>';
        ?> -->

<?php
$fdate = $_GET['date'];
$fcat = $_GET['fcat'];
$dim = $_GET['dim'];
$client = $_GET['client'];
$id = $_GET['id'];
$_SESSION['animationID'] = $id;
$_SESSION['tableName'] = $client;
// $name = explode(",", $_GET['update']);
// $_SESSION['animationID'] = $name[0];
// $_SESSION['tableName'] = $name[1];
$query = "SELECT * from `" . $client . "` WHERE id = '" . $id . "' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

//  $jsid = $_GET['hidden1'];
//  echo $_GET['hidden1'];
echo "<form method='POST'><table class='table1' id='table1'>
            <thead>
            <tr>
                <td>Assets</td>
                <td>Select Animation</td>
                <td>Duration</td>
                <td>Delay</td>
                <td>Repeat Delay</td>
                <td>Animation Repeat Count</td>

            </tr></thead><tbody>";
$tab1 = "SELECT * from `" . $row['client'] . "` WHERE id = " . $row['id'] . " ";
$result2 = mysqli_query($conn, $tab1);
while ($row1 = mysqli_fetch_assoc($result2)) {
    $json[] = $row1;
}
echo "<tr>";
foreach ($json[0] as $key => $x_value) {
    if ($key != 'impression' && $key != 'click' && $key != 'animation' && $key != 'testanim' && $key != 'dim' && $key != 'id' && $key != 'date' && $key != 'client' && $key != 'campaign' && $key != 'fcat' && $x_value != null) {
        $items[] = $key;
        echo "<td>$key</td>";
        echo '<td><select style="width: 100%" name="' . $key . '" id = "' . $key . '1">';
        echo '<option value ="">Select Animation</option>';
        $sql = "select * from anim";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $aname = $row['name'];
            $anim = $row['anim'];
            echo "<option value ='" . $anim . "'>" . $aname . "</option>";
        }

        echo '</select></td>';
        echo "<td><input type='text' id='" . $key . "durn' name='" . $key . "durn' placeholder='Duration' class='rdurn'></td>";
        echo "<td><input type='text' id='" . $key . "delay' name='" . $key . "delay' placeholder='Delay' class='rdelay'></td>";
        echo "<td><input type='text' id='" . $key . "repeat_delay' name='" . $key . "repeat_delay' placeholder='repeat delay' class='rclass'></td>";
        echo "<td><input type='number' id='" . $key . "repeat' name='" . $key . "repeat' placeholder='No.of repeats' class='rnumber'></td></td></tr>";
    }
}



$col = implode(",", $items);
echo "<input type='hidden' id='hidden1' name='hidden1' value='" . $col . "'>";

echo "</tbody></table><br>";
echo "<button name='preview' id='preview1'    style='border:1px solid black;font-size:15px;'>Preview</button>";
echo "<button name='save' id='save1' type='submit' style='border:1px solid black;font-size:15px;'>Save</button>";
echo "<button name='cancel' id='cancel1'  style='border:1px solid black;font-size:15px;'>Cancel</button> </form>";

$ta = "SELECT * from $client WHERE id = $id ";
// $ta = "SELECT testanim from `".$row['client']."` WHERE id = ".$row['id']." ";
$result3 = mysqli_query($conn, $ta);
$row3 = mysqli_fetch_assoc($result3);
$tsan = $row3['testanim'];

if (isset($_POST['save'])) {

    if ($tsan != null && $tsan != "") {
        $updateQuery = "UPDATE $client SET animation = '$tsan' where id = $id";
        $executeQuery = mysqli_query($conn, $updateQuery);
        $updateQuery2 = "UPDATE $client SET testanim = '' where id = $id";
        $executeQuery2 = mysqli_query($conn, $updateQuery2);
    } else {
        $updatedAnimation = null;
        $animationID = $_SESSION['animationID'];
        $tableName = $_SESSION['tableName'];

        $ids[] = explode(",", $_POST['hidden1']);
        foreach ($ids[0] as $colname) {

            $ee = $colname . "delay";
            $rdelay = $colname . "repeat_delay";
            $repeat = $colname . "repeat";

            $animvalue = str_replace(array("durn","idd", "edelay", "erdelay", "erepeat"), array($_POST[$colname . "durn"],$colname, $_POST[$colname . "delay"], $_POST[$colname . "repeat_delay"], $_POST[$colname . "repeat"]), $_POST[$colname]);
            $updatedAnimation = $updatedAnimation . $animvalue;
        }

        $updateQuery = "UPDATE $tableName SET animation = '$updatedAnimation' where id = $animationID";
        $executeQuery = mysqli_query($conn, $updateQuery);
    }
    if($executeQuery){
        header("location:page3.php?id=".$id."&date=".$fdate."&client=".$client."&fcat=".$fcat."&dim=".$dim."&update=".$val."%2C".$client);
        ob_end_flush();
    }
}

if (isset($_POST['preview'])) {
    $updatedAnimation = null;
    $animationID = $_SESSION['animationID'];
    $tableName = $_SESSION['tableName'];

    $ids[] = explode(",", $_POST['hidden1']);
    // print_r($_GET['hidden1']);
    foreach ($ids[0] as $colname) {

        // echo $colname."<br>";
        $ee = $colname . "delay";
        $rdelay = $colname . "repeat_delay";
        $repeat = $colname . "repeat";

        // echo "delay".$_GET['bgdelay']."<br>";
        // echo "ee".$_GET[$colname]."<br>";
        $animvalue = str_replace(array("durn","idd", "edelay", "erdelay", "erepeat"), array($_POST[$colname . "durn"],$colname, $_POST[$colname . "delay"], $_POST[$colname . "repeat_delay"], $_POST[$colname . "repeat"]), $_POST[$colname]);
            $updatedAnimation = $updatedAnimation . $animvalue;

        // echo $executeQuery;

    }

    $updateQuery = "UPDATE $tableName SET testanim = '$updatedAnimation' where id = $animationID";
    // echo $updateQuery;
    $executeQuery = mysqli_query($conn, $updateQuery);
    if ($executeQuery) {
        header("location:page3.php?id=" . $id . "&date=" . $fdate . "&client=" . $client . "&fcat=" . $fcat . "&dim=" . $dim . "&update=" . $val . "%2C" . $client);
        ob_end_flush();
    }
}
if (isset($_POST['cancel'])) {
    $updateQuery2 = "UPDATE $client SET testanim = '' where id = $id";
        $executeQuery2 = mysqli_query($conn, $updateQuery2);
        header("location:page3.php?id=".$id."&date=".$fdate."&client=".$client."&fcat=".$fcat."&dim=".$dim."&update=".$val."%2C".$client);
        ob_end_flush();
}
?>


<div id="dyn" style="position:relative;display: flex;flex-wrap: wrap;width:100%"></div>

<script>
    var static;
    var myScript;
    var inlineScript;


    function demo() {

        var creative = <?php echo json_encode($json) ?>;




        for (var i = 0; i < creative.length; i++) {
            var newDiv = document.createElement("div");
            newDiv.id = "box" + i;
            newDiv.setAttribute('style', 'position:relative;border:1px solid black;margin:5px 5px;overflow: hidden;width:' + creative[i]['dim'].split('x')[0] + 'px;height:' + creative[i]['dim'].split('x')[1] + 'px')
            document.getElementById("dyn").appendChild(newDiv)

            if (creative[i]['testanim'] != "" && creative[i]['testanim'] != null) {

                static = new Array(creative[i]);
                var width = creative[i]['dim'].split('x')[0] + "px";
                var html = "";
                static.forEach(function(val) {
                    var keys = Object.keys(val);
                    keys.forEach(function(key) {

                        if (key != 'impression' && key != 'click' && key != 'testanim' && key != 'dim' && val[key] != "" && key != 'id' && key != 'date' && key != 'client' && key != 'campaign' && key != 'fcat' && val[key] != null) {
                            var idd = key;
                            html += "<img id = '" + idd + "' style='position:absolute;top:0px;left:0px;width:" + width + "' src='" + val[key] + "'>";
                        }
                    });
                });
                var keyss = Object.keys(creative[i]);

                document.getElementById('box' + i).innerHTML = html;


                if (creative[i]['testanim'] != "" && creative[i]['testanim'] != null) {
                    myScript = document.createElement("script");
                    inlineScript = document.createTextNode(creative[i]['testanim']);
                    myScript.appendChild(inlineScript);
                    document.head.appendChild(myScript);
                }
            } else {
                static = new Array(creative[i]);
                var width = creative[i]['dim'].split('x')[0] + "px";
                var html = "";
                static.forEach(function(val) {
                    var keys = Object.keys(val);
                    keys.forEach(function(key) {

                        if (key != 'impression' && key != 'click' && key != 'animation' && key != 'dim' && val[key] != "" && key != 'id' && key != 'date' && key != 'client' && key != 'campaign' && key != 'fcat' && val[key] != null) {
                            var idd = key;
                            html += "<img id = '" + idd + "' style='position:absolute;top:0px;left:0px;width:" + width + "' src='" + val[key] + "'>";
                        }
                    });
                });
                var keyss = Object.keys(creative[i]);

                document.getElementById('box' + i).innerHTML = html;


                if (creative[i]['animation'] != null) {
                    myScript = document.createElement("script");
                    inlineScript = document.createTextNode(creative[i]['animation']);
                    myScript.appendChild(inlineScript);
                    document.head.appendChild(myScript);
                }

            }


        }
        var idcheck = [];
        var t = document.getElementById('dyn').getElementsByTagName('img');
        for (i = 0; i < t.length; i++) {
            idcheck.push(t[i].id);
        }
    }
    demo();
</script>