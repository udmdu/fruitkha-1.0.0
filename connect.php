<?php

// past version 
/*if (isset($_POST['STDB'])) {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['middleinitial']) && isset($_POST['gender']) && isset($_POST['emailadd']) && isset($_POST['civstatus']) && isset($_POST['mobilenumb']) && isset($_POST['birth']) && isset($_POST['shippingadd']) && isset($_POST['ccnum']) && isset($_POST['dateexpire']) && isset($_POST['threedigit'])) {

        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname']; 
        $middleinitial = $_POST['middleinitial'];
        $gender = $_POST['gender'];
        $emailadd = $_POST['emailadd'];
        $civstatus = $_POST['civstatus'];
        $mobilenumb = $_POST['mobilenumb'];
        $birth = $_POST['birth'];
        $shippingadd = $_POST['shippingadd'];
        $ccnum = $_POST['ccnum'];
        $dateexpire = $_POST['dateexpire'];
        $threedigit = $_POST['threedigit'];*/
              
            $con = mysqli_connect('localhost','root', '', 'lhuile');
            if (mysqli_connect_error()) {
                exit('Connection Failed : '.mysqli_connect_error());
            } 

            if ($stmt = $con->prepare('SELECT emailadd From test Where emailadd = ? Limit 1')) {
                $stmt->bind_param('s', $_POST['emailadd']);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows>0) {
                    echo 'Email Address already taken. Try again.';
                } else {
                    if ($stmt = $con->prepare("INSERT INTO test (firstname, lastname, middleinitial, gender, emailadd, civstatus, mobilenumb, birth, shippingadd, ccnum, dateexpire, threedigit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {

                        /*$lastname = $_POST['lastname'];
                        $firstname = $_POST['firstname']; 
                        $middleinitial = $_POST['middleinitial'];
                        $gender = $_POST['gender'];
                        $emailadd = $_POST['emailadd'];
                        $civstatus = $_POST['civstatus'];
                        $mobilenumb = $_POST['mobilenumb'];
                        $birth = $_POST['birth'];
                        $shippingadd = $_POST['shippingadd'];
                        $ccnum = $_POST['ccnum'];
                        $dateexpire = $_POST['dateexpire'];
                        $threedigit = $_POST['threedigit'];*/
                        
                        $stmt->bind_param("ssssssissisi", $_POST['firstname'], $_POST['lastname'], $_POST['middleinitial'], $_POST['gender'], $_POST['emailadd'], $_POST['civstatus'], $_POST['mobilenumb'], $_POST['birth'], $_POST['shippingadd'], $_POST['ccnum'], $_POST['dateexpire'], $_POST['threedigit']);
                        $stmt->execute();
                        echo 'Succcessfully Registed';

                    } 
                    else {
                        echo 'Error Occured with inputting values';
                    }
                }
            } else {
                echo 'Error Occured in preparing values';
            }

            $con->close();


                /*$stmt = $conn->prepare("Insert into register(firstname, lastname, middleinitial, gender, emailadd, civstatus, mobilenumb, birth, shippingadd, ccnum, dateexpire, threedigit) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssissisi", $firstname, $lastname, $middleinitial, $gender, $emailadd, $civstatus, $mobilenumb, $birth, $shippingadd, $ccnum, $dateexpire, $threedigit);
                $stmt->execute();
                echo "Registered Successfully...";
                $stmt->close();
                $conn->close();
            


                // past version 
                $Select = "SELECT emailadd From register Where emailadd = ? Limit 1";
                $Insert = "INSERT INTO register (firstname, lastname, middleinitial, gender, emailadd, civstatus, mobilenumb, birth, shippingadd, ccnum, dateexpire, threedigit) values (?,?,?,?,?,?,?,?,?,?,?,?)";
                
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s", $emailadd);
                $stmt->execute();
                $stmt->bind_result($emailadd);
                $stmt->store_result();
                $stmt->fetch();
                $rnum = $stmt->num_rows;
                
                if ($rnum == 0) {
                    $stmt->close();
                    
                    $stmt = $conn->prepare($Insert);
                    $stmt->bind_param("ssssssissisi", $firstname, $lastname, $middleinitial, $gender, $emailadd, $civstatus, $mobilenumb, $birth, $shippingadd, $ccnum, $dateexpire, $threedigit);
                    if ($stmt->execute()) {
                        echo "New record inserted successfully";
                    } else {
                        echo $stmt->error;
                    }
                    
                } else {
                    echo "Someone already registered using this email";
                }
                $stmt->close();
                $conn->close();
            }
        }
    }*/
?>