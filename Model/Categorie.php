<?php
class Categorie
{
    private ?int $id_categorie = null;
    private ?string $nom = null;
    private ?string $description = null;

    public function __construct(?int $id_categorie = null, ?string $nom = null, ?string $description = null)
    {
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->description = $description;
    }

    public function getIdCategorie(): ?int
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(?int $id_categorie): self
    {
        $this->id_categorie = $id_categorie;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    // CRUD

    public function addCategorie($categorie)
    {
        $sql = "INSERT INTO categorie VALUES (null, :nom, :description)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $categorie->getnom(),
                'description' => $categorie->getDescription(),

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listCategories()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCategorie($id_categorie)
    {
        $sql = "DELETE FROM categorie WHERE id_categorie = :id_categorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_categorie', $id_categorie);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
