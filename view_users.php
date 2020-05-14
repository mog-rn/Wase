<?php
try {
    //code...
    //Script retreving all the records from the users table
    //Setting the row no of display 
    $pagerows = 4;

        if (isset($_GET['p']) && is_numeric($_GET['p'])) {
            # code...
            $pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
            //making sure it is not executable XSS
        }else {
            # code...
            //use the next block of code to calculate the number of pages
            //Checking first for the total number of records
            $q = "SELECT COUNT(userid) FROM users";
            $result = mysqli_query($dbcon, $q);
            $row = mysqli_fetch_array ($result, MYSQLI_NUM);
            $records = htmlspecialchars($rows[0], ENT_QUOTES);
            //Not executable XSS
            //Now calculate the number of pages 
            if ($records > $pagerows) {
                # code...
                //Calculate the number of pages and round off to the nearest integer
                $pages = ceil ($records/$pagerows);
            }else {
                # code...
                $pages = 1;
            }
        }//page check finished

        //Declare which record to start with 
        if ((isset($_GET['s'])) && (is_numeric($_GET['s'], ENT_QUOTES))) {
            # code...
            $start = htmlspecialchars($_GET['s'], ENT_QUOTES);
            //Making sure it is not executable
        }else {
            # code...
            $start = 0;
        }


        $query = "SELECT last_name, first_name, email, "; //                        #5
        $query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
        $query .=
        " AS regdat, userid FROM users ORDER BY registration_date ASC";
        $query .=" LIMIT ?, ?";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // bind start and pagerows to SQL Statement
        mysqli_stmt_bind_param($q, "ii", $start, $pagerows);
        // execute query
        mysqli_stmt_execute($q);
        $result = mysqli_stmt_get_result($q);
        if ($result) {
            # code...
            //if it ran OK, display the records 
            /**Table Header */
            echo '<table class="table table-stripped">
            <tr>
              <th scope="col">Edit</th>
              <th scope="col">Delete </th>
              <th scope="col">Last Name </th>
              <th scope="col">First Name</th>
              <th scope="col">Email</th>
              <th scope="col">Date Registered</th>
            </tr>';
            //Fetch and print all the records
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                # code...
                //Removing the special characters that might already be in the table to reduce the chances of XSS exploits
                $user_id = htmlspecialchars($row['userid'], ENT_QUOTES);
                $last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
                $first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
                $email = htmlspecialchars($row['email'], ENT_QUOTES);
                $registration_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
            echo  '<tr>
                       <td><a href="edit_user.php?id=' . $user_id . '">Edit</a></td>
                       <td><a href="delete_user.php?id=' . $user_id . '">Delete</a></td>
                       <td>' . $last_name . '</td>
                       <td>' . $first_name . '</td>
                       <td>' . $email . '</td>
                       <td>' . $registration_date . '</td>
                       </tr>';
               }
               echo '</table>'; // Close the table.
               mysqli_free_result ($result); // Free up the resources.
        }
         else {
             # code...
             // If it did not run OK.
               // Error message:
        echo '<p class="text-center">The current users could not be ';
        echo 'retrieved. We apologize for any inconvenience.</p>';
               // Debug message:
        // echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
               exit;
         }   //End of else ($result)
            //Now displaying the number of records/members

            $q = "SELECT COUNT(userid) FROM users";
        $result = mysqli_query ($dbcon, $q);
        $row = mysqli_fetch_array ($result, MYSQLI_NUM);
        $members = htmlspecialchars($row[0], ENT_QUOTES);
        mysqli_close($dbcon); // Close the database connection.
        $echostring = "<p class='text-center'>Total membership: $members </p>";
        $echostring .= "<p class='text-center'>";
        if ($pages > 1) {   //What number id the current page 
            $current_page = ($start/$pagerows) + 1;
            //If the page is not the first page then create the previous link page
            if ($current_page != 1) {
                # code...
                $echostring .= '<a href="admin_view_users.php?s=' . ($start + $pagerows) . '&p=' . $pages . '">Next</a>';
            }                     
            $echostring .= '</p>';
            }
            echo $echostring;
        }
    //end of try 

 catch (Exception $e) {
    //throw $th;
    //Problem handlers
    // print "An Exception occurred. Message: " . $e->getMessage();
        print "The system is busy please try later";
}
catch(Error $e) {
    //print "An Error occurred. Message: " . $e->getMessage();
        print "The system is busy please try again later.";
}
?>