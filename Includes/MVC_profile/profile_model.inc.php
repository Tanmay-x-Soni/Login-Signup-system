<?php 

declare(strict_types=1);


function set_profile_data(object $pdo , string $fullName , string $phoneNumber ,string $gender ,string $DOB , string $country ,string $bio ,int $userId){

        $query = "UPDATE Accounts 
                   SET FULL_NAME = :full_name ,
                       PHONE = :phone ,
                       GENDER = :gender , 
                       DOB = :dob ,
                       COUNTRY = :country ,
                       BIO = :bio 
                    WHERE ID = :id;
                   ";

        $statement = $pdo -> prepare($query);
        
        $statement->bindparam( ":full_name" , $fullName);        
        $statement->bindparam( ":phone" , $phoneNumber);        
        $statement->bindparam( ":gender" , $gender);        
        $statement->bindparam( ":dob" , $DOB);        
        $statement->bindparam( ":country" , $country );        
        $statement->bindparam( ":bio" , $bio);
        $statement->bindparam( ":id" , $userId , PDO::PARAM_INT);

        $statement -> execute();
}

?>