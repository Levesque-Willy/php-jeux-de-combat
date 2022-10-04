<?php
class PersonnagesManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Personnage $perso)
    {
        $request = $this->_db->prepare('INSERT INTO personnages SET nom = :nom,`force` = :force, pv = :pv, xp = :xp');

        $request->bindValue(':nom', $perso->getNom(), PDO::PARAM_STR);
        $request->bindValue(':force', $perso->getForce(), PDO::PARAM_INT);
        $request->bindValue(':xp', $perso->getXp(), PDO::PARAM_INT);
        $request->bindValue(':pv', $perso->getPv(), PDO::PARAM_INT);

        $request->execute();

        if ($request->errorCode() > 0) {
            echo "<br/>Une erreur sql est survenue:";
            print_r(($request->errorInfo()[2]));
        }
    }

    public function delete(Personnage $perso)
    {
        $request = $this->_db->prepare(('DELETE FROM personages WHERE id =:id'));
        $request->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
        $request->execute();
        if ($request->errorCode() > 0) {
            echo "<br/>Une erreur sql est survenue:";
            print_r(($request->errorInfo()[2]));
        }
    }



    public function getOne($id): Personnage //Read
    {
        $id = (int) $id;

        $request = $this->_db->prepare('SELECT id, nom,`force`, xp, pv FROM personnages');
        $request->execute();

        if ($request->errorCode() > 0) {
            echo "<br/>une erreur SQL est intervenue :";
            print_r($request->errorInfo()[2]);
        }
        $ligne = $request->fetch(PDO::FETCH_ASSOC);
        return new Personnage($ligne);
    }

    public function getList()  //Read 
    {
        $persos = array();
        $request = $this->_db->query('SELECT id , nom,`force`, pv, xp FROM personnages');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $perso = new Personnage($ligne);
            $persos[] = $perso;
        }
        return $persos;        
    }


    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}
