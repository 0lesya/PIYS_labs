<?php

namespace Lab1;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;

Class User{

    private $id;

    private $name;

    private $email;

    private $password;

    private string $createDate;

    public function __construct($id, $name, $email, $password ){

        $this->id = $id;
        $this->name=$name;
        $this->email=$email;
        $this->password = $password;
        $this->createDate= date("Y-m-d H:i:s");
        
        $validator = Validation::createValidator();
       
        $violations = [];

        $violations[] = $validator->validate($this->id, [new NotBlank()]);

        $violations[] = $validator->validate($this->name, [new Length(['min'=>3]), new NotBlank()]);
      
        $violations[] = $validator->validate($this->email, [new NotBlank(), new Email(),]);

        $violations[] = $validator->validate($this->password, [new Length(['min'=>8]), new NotBlank()]);
    
        if (count($violations) > 0) { 
            foreach ($violations as $violation) { 
                foreach($violation as $viol){
                    echo $viol->getMessage()."\n";}
            }
        }
    }

    public function dateOfCreate(){
        return $this->createDate;
    }
}
?>
