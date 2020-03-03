<?php
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=truck.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    
    
    $output = "";
    
   
        $output .="
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>student_id</th>
                        <th>student_name</th>
                        <th>attendance</th>
                        <th>attendance_date</th>
                        <th>attendance_time</th>
                        <th>attendance_status</th>
                        <th>system_ip_address</th>
                        
                    </tr>
                <tbody>
        ";
        
        
       foreach ($show as $valuee) {
            
        $output .= "
                    <tr>
                        <td>".$valuee['id']."</td>
                        <td>".$valuee['student_id']."</td>
                        <td>".$valuee['student_name']."</td>
                        <td>".$valuee['attendance']."</td>
                        <td>".$valuee['attendance_date']."</td>
                        <td>".$valuee['attendance_time']."</td>
                        <td>".$valuee['attendance_status']."</td>
                        <td>".$valuee['system_ip_address']."</td>
                        
                    </tr>
        ";
        }
        
        $output .="
                </tbody>
                
            </table>
        ";
        
        echo $output;
    
    
?>