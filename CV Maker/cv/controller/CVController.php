<?php
include '../connexion.php';
include '../model/cv.php';

class CVController
{   // le fameux CRUD
    public function listCVs()
    {
        $sql = "SELECT * FROM cv";
        $db = connexion::getConnexion();
        try {
            $cvList = $db->query($sql);
            return $cvList;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCV($id)
    {
        $sql = "DELETE FROM cv WHERE id= :id";
        $db = connexion::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCV($cv)
    {
        $sql = "INSERT INTO cv
        VALUES (NULL, :img, :fname, :lname, :prof, :email, :numtel, :poste, :entreprise, :lieu, :dde, :dfe, :obj, :comp, :dip, :inst, :lieud, :ddd, :dfd)";
        $db = connexion::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'img' => $cv->getImagePath(),
                'fname' => $cv->getFname(),
                'lname' => $cv->getLname(),
                'prof' => $cv->getProf(),
                'email' => $cv->getEmail(),
                'numtel' => $cv->getNumtel(),
                'poste' => $cv->getPoste(),
                'entreprise' => $cv->getEntreprise(),
                'lieu' => $cv->getLieuEntreprise(),
                'dde' => $cv->getDateDebutEntreprise()->format('Y-m-d'),
                'dfe' => $cv->getDateFinEntreprise()->format('Y-m-d'),
                'obj' => $cv->getObjective(),
                'comp' => $cv->getCompetencies(),
                'dip' => $cv->getDiploma(),
                'inst' => $cv->getInstitution(),
                'lieud' => $cv->getDiplomaLocation(),
                'ddd' => $cv->getDateDebutDiploma()->format('Y-m-d'),
                'dfd' => $cv->getDateFinDiploma()->format('Y-m-d'),
            ]);
            return $db->lastInsertId();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    }

    function updateCV($cv, $id)
    {
        
        try {
            $db = connexion::getConnexion();
            $query = $db->prepare(
                'UPDATE cv SET 
                    img = :img, 
                    fname = :fname, 
                    lname = :lname,
                    prof = :prof,
                    email = :email,
                    numtel = :numtel,
                    poste = :poste,
                    entreprise = :entreprise,
                    lieu = :lieu,
                    dde = :dde,
                    dfe = :dfe,
                    obj = :obj,
                    comp = :comp,
                    dip = :dip,
                    inst = :inst,
                    lieud = :lieud,
                    ddd = :ddd,
                    dfd = :dfd
                WHERE id = :id'
            );
            $query->execute([
                'id' => $id,
                'img' => $cv->getImagePath(),
                'fname' => $cv->getFname(),
                'lname' => $cv->getLname(),
                'prof' => $cv->getProf(),
                'email' => $cv->getEmail(),
                'numtel' => $cv->getNumtel(),
                'poste' => $cv->getPoste(),
                'entreprise' => $cv->getEntreprise(),
                'lieu' => $cv->getLieuEntreprise(),
                'dde' => $cv->getDateDebutEntreprise()->format('Y-m-d'),
                'dfe' => $cv->getDateFinEntreprise()->format('Y-m-d'),
                'obj' => $cv->getObjective(),
                'comp' => $cv->getCompetencies(),
                'dip' => $cv->getDiploma(),
                'inst' => $cv->getInstitution(),
                'lieud' => $cv->getDiplomaLocation(),
                'ddd' => $cv->getDateDebutDiploma()->format('Y-m-d'),
                'dfd' => $cv->getDateFinDiploma()->format('Y-m-d'),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo    $e->getMessage();
            
        }
    }

    function showCV($id) 
    {
        $sql = "SELECT * from cv where id = $id";
        $db = connexion::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $cv = $query->fetch();
            return $cv;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
