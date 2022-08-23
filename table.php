<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="main">
        <div id="table-div">
            <div id="nav">
                <div id="left">
                    <img class="logonav" src="#">
                </div>
                <!-- <div id="between"></div> -->
                <div id="right">
                    <div id="structure"> <a class="nava" href="./nav/solution.html">Solutions</a> </div>
                    <div id="structure"> <a class="nava" href="./nav/aboutus/aboutus.html">About me</a> </div>
                    <div id="structure"> <a class="nava" href="./nav/contactme.html">Contact me</a> </div>
                    <!-- <div id="structure">  <i class="ri-menu-line nava"></i> </div> -->
                </div>
            </div>
            <div id="tcontent">
                <div id="content">
                    <!-- <h1>Prioritization Tool</h1> -->
                    <div class="waviy">
                        <span style="--i:1">P</span>
                        <span style="--i:2">r</span>
                        <span style="--i:3">i</span>
                        <span style="--i:4">o</span>
                        <span style="--i:5">r</span>
                        <span style="--i:6">i</span>
                        <span style="--i:7">t</span>
                        <span style="--i:8">i</span>
                        <span style="--i:9">z</span>
                        <span style="--i:10">a</span>
                        <span style="--i:11">t</span>
                        <span style="--i:12">i</span>
                        <span style="--i:13">o</span>
                        <span style="--i:14">n</span>
                        <span style="--i:15"></span>
                        <span style="--i:16"></span>
                        <span style="--i:17"></span>
                        <span style="--i:18">T</span>
                        <span style="--i:19">o</span>
                        <span style="--i:20">o</span>
                        <span style="--i:21">l</span>
                    </div>
                    <p>Empowering radiologists to detect urgent cases faster and reducing overall report turnaround time directly in the workflow</p>
                </div>

                <table>
                    <tr>
                        <th>Priority Number</th>
                        <th>Patient Name</th>
                        <th>Patient MRN</th>
                        <th>Patient Modality</th>
                        <th>Date And Time</th>
                        <th>Hospital Location</th>
                        <th>Inspection</th>
                    </tr>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "dbname");
                    $sql = "SELECT * FROM worklist";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["Priority_Number"] . "</td><td>" . $row["Patient_Name"] . "</td><td>" . $row["Patient_MRN"] . "</td><td>" . $row["Modality"] . "</td><td>" . $row["Date_Time"] . "</td><td>" . $row["Hospital_Location"] . "</td><td>" . $row["Inspection"] . "</td></tr>";
                        }
                    } else {
                        echo "No Results";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>