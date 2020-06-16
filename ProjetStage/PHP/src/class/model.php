<?php


namespace Core\Model;


 abstract class Model
{
protected $id;

     /**
      * @return mixed
      */
     public function getId()
     {
         return $this->id;
     }

     /**
      * @param mixed $id
      * @return Model
      */
     public function setId($id)
     {
         $this->id = $id;
         return $this;
     }

}