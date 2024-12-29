<?php
require "../../dbconnection.php";

$sql ="CREATE TABLE IF NOT EXISTS  sports_group (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,               
    title VARCHAR(255) NOT NULL,                      
    event_date DATE NOT NULL,                          
    start_time TIME NOT NULL,                          
    end_time TIME NOT NULL,                            
    city VARCHAR(100) NOT NULL,                       
    address VARCHAR(255) NOT NULL,                     
    max_members INT NOT NULL,                          
    current_members INT DEFAULT 0,                     
    sport_type VARCHAR(100) NOT NULL,  
    payment_method SET('cash','transfer') NOT NULL,
    payment_amount INT NOT NULL,                
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE   
);";
// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Table sports group created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
