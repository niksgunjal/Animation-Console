<?php
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


<body>

    <form id="formId" method="GET" action="page2.php">
       <br> Select Date - <input class="date" type="date" name="fdate"><br><br>
        Select Client - <select name="client">
            <option value="">Select client</option>
            <?php
                $sql = "show tables";
                $result = mysqli_query($conn, $sql);
                while ($table = mysqli_fetch_array($result)) {
                    $tabnames[] = $table[0];

                    echo '<option value =' . ($table[0]) . '>' . ($table[0]) . '</option>';
                }

            ?>
        </select> <br><br><button name="submit" type="submit" style="border:1px solid black;font-size:15px;">Submit</button><br><br>

      

    </form>

   


</body>
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

</html>