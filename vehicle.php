<?php
$Vname=$_GET["vehicleRegNo"];
//create connection
$conn=mysqli_connect("localhost","root","");
//select database
$db=mysqli_select_db($conn,"vehicleregistration");
if(isset($Vname)){
    $sql="select * from vehicle where registration_no='".$Vname."'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        echo "<h1>Vehicle details</h1>";
        echo "<table border=\"1\">
            <tr>
            <th>Vehicle registration number</th>
            <th>Owner name</th>
            <th>Address</th>
            <th>Contact number</th>
            </tr>";
            while($row=mysqli_fetch_array($query)){
                echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                    </tr>";  
            }
                echo "</table>";

    }
    else
    {
        echo "Entered registration number not found!!";  
    }
    //close connection
    mysqli_close($conn);   
}
else{
    echo "sql query not responded";
}

?>