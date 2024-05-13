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
}
