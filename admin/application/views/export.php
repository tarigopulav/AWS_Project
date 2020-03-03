<?php
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=container.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

   $conn = mysqli_connect("localhost","gwalioro_akash","akash@10884","gwalioro_student_attendance");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    
    $output = "";
    
   
        $output .="
            <table>
                <thead>
                    <tr>
                    
                        <th>status</th>
                        <th>sk_id</th>
                    </tr>
                <tbody>
        ";
        
       
            
        $output .= "
                    <tr>
                      <td>status</td>
                        <td>sk_id</td>
                    </tr>
        ";
        
        
        $output .="
                </tbody>
                
            </table>
        ";
        
        echo $output;
    
    
?>