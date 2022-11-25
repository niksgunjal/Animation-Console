<?php
session_start();
include "connection.php";
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/TweenMax.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<?php
// if(isset($_GET['cancel'])){$fdate = $_GET['fdate'];}

//  $tabnames[] = $table[0];
// //  $table = mysqli_fetch_array($result);
// $tabname = implode(",", $tabnames);
$animationID = 0;
if (isset($_GET['submit'])) {
    $client = $_GET['client'];
    $fdate = $_GET['fdate'];
    
?>
    <h2><?php echo $client; ?></h2><br>
<?php
    echo "<table class='table1' id='table1'>
    <thead>
    <tr>
        <td>Date</td>
        <td>client</td>
        <td>Fcat</td>
        <td>Dimension</td>
        <td>Animation</td>
        <td></td>
    </tr></thead><tbody>";

    $tab = "select * FROM $client where date = '$fdate' ";
    $result = mysqli_query($conn, $tab);
    while ($row = mysqli_fetch_array($result)) {
        $val =  $row['id'] . "," . $client;
        
        echo "<tr>
        <td>" . $row['date'] . "</td>
        <td>" . $row['client'] . "</td>
        <td>" . $row['fcat'] . "</td>
        <td>" . $row['dim'] . "</td>
        <td class='section1'>" . $row['animation'] . "</td>
        <td>
            <form method='GET' action='page3.php'>
                <!-- hidden input fileds -->
                <input hidden type='text' name='id' value=" .$row['id'].">
                <input hidden type='text' name='date' value=" .$row['date'].">
                <input hidden type='text' name='client' value=" .$row['client'].">
                <input hidden type='text' name='fcat' value=" .$row['fcat'].">
                <input hidden type='text' name='dim' value=" .$row['dim'].">


                <button name='update' id='update' value='" . $val . "' type='submit' style='border:1px solid black;font-size:15px;'>Update</button>
            </form>
        </td>
        </tr>";
    }
    echo "</tbody></table>";
}

?>


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
    demo()

    

    
</script>

