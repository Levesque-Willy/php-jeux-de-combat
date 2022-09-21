<?php
class PersonnagesManager{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Personnage $perso){
        $request = $this->_db->prepare('INSERT INTO personages SET nom = :nom,`force` = :force,pv = :pv,xp = :xp');

        $request->binValue(':nom',$perso->getNom(),PDO::PARAM_STR);
        $request->binValue(':force',$perso->getForce(),PDO::PARAM_INT);
        $request->binValue(':xp',$perso->getXp(),PDO::PARAM_INT);
        $request->binValue(':Pv',$perso->getPv(),PDO::PARAM_INT);
    }

   public function delete(Personnage $perso)
   {
    $request = $this->_db->prepare(('DELETE FROM personages WHERE id =:id'));
    $request->binValue(':id',$perso->getId(),PDO::PARAM_INT);
    $request->execute();
    if($request->errorCode()>0){

    } 
   }


    
    public function getOne($id) : Personnage //Update
    {
        $id =(int) $id;

        $request = $this->_db->prepare('SELECT id,nom,`force`,xp,pv FROm persçonages');
        $request->execute();

        if($request->errorCode()>0){
            echo "<br/>une erreur SQL est intervenue :";
            print_r($request->errorInfo()[2]);
        }
        $ligne = $request->fetch(PDO::FETCH_ASSOC);
        return new Personnage($ligne);
    }

    
    public function setDb(PDO $db)
    {
        $this->_db = $db;        
    }
}



?>