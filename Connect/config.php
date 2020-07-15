
    <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "a1";
                $conn = mysqli_connect($servername, $username, $password,$dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // echo "Connected successfully";

                //$conn->close();
                //  $cookie_name = '';

                // $cookie_time = (20); // 30 days

                

     ?>