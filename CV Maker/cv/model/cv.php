<?php
class CV
{
    private ?int $id = null;
    private ?string $imagePath = null;
    private ?string $fname = null;
    private ?string $lname = null;
    private ?string $prof = null;
    private ?string $email = null;
    private ?int $numtel = null;
    private ?string $poste = null;
    private ?string $entreprise = null;
    private ?string $lieuEntreprise = null;
    private ?DateTime $dateDebutEntreprise = null;
    private ?DateTime $dateFinEntreprise = null;
    private ?string $objective = null;
    private ?string $competencies = null;
    private ?string $diploma = null;
    private ?string $institution = null;
    private ?string $diplomaLocation = null;
    private ?DateTime $dateDebutDiploma = null;
    private ?DateTime $dateFinDiploma = null;

    public function __construct($img, $fn, $ln, $p, $e, $nt, $pos, $ent, $le, $de, $df, $o, $c, $dip, $inst, $ld, $dd, $dfd)
    {
        $this->imagePath = $img;
        $this->fname = $fn;
        $this->lname = $ln;
        $this->prof = $p;
        $this->email = $e;
        $this->numtel = $nt;
        $this->poste = $pos;
        $this->entreprise = $ent;
        $this->lieuEntreprise = $le;
        $this->dateDebutEntreprise = new DateTime($de);
        $this->dateFinEntreprise = new DateTime($df);
        $this->objective = $o;
        $this->competencies = $c;
        $this->diploma = $dip;
        $this->institution = $inst;
        $this->diplomaLocation = $ld;
        $this->dateDebutDiploma = new DateTime($dd);
        $this->dateFinDiploma = new DateTime($dfd);
    }
    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function getProf(): ?string
    {
        return $this->prof;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function getLieuEntreprise(): ?string
    {
        return $this->lieuEntreprise;
    }

    public function getDateDebutEntreprise(): ?DateTime
    {
        return $this->dateDebutEntreprise;
    }

    public function getDateFinEntreprise(): ?DateTime
    {
        return $this->dateFinEntreprise;
    }

    public function getObjective(): ?string
    {
        return $this->objective;
    }

    public function getCompetencies(): ?string
    {
        return $this->competencies;
    }

    public function getDiploma(): ?string
    {
        return $this->diploma;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function getDiplomaLocation(): ?string
    {
        return $this->diplomaLocation;
    }

    public function getDateDebutDiploma(): ?DateTime
    {
        return $this->dateDebutDiploma;
    }

    public function getDateFinDiploma(): ?DateTime
    {
        return $this->dateFinDiploma;
    }

    // Setters
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function setFname(?string $fname): void
    {
        $this->fname = $fname;
    }

    public function setLname(?string $lname): void
    {
        $this->lname = $lname;
    }

    public function setProf(?string $prof): void
    {
        $this->prof = $prof;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setNumtel(?int $numtel): void
    {
        $this->numtel = $numtel;
    }

    public function setPoste(?string $poste): void
    {
        $this->poste = $poste;
    }

    public function setEntreprise(?string $entreprise): void
    {
        $this->entreprise = $entreprise;
    }

    public function setLieuEntreprise(?string $lieuEntreprise): void
    {
        $this->lieuEntreprise = $lieuEntreprise;
    }

    public function setDateDebutEntreprise(?DateTime $dateDebutEntreprise): void
    {
        $this->dateDebutEntreprise = $dateDebutEntreprise;
    }

    public function setDateFinEntreprise(?DateTime $dateFinEntreprise): void
    {
        $this->dateFinEntreprise = $dateFinEntreprise;
    }

    public function setObjective(?string $objective): void
    {
        $this->objective = $objective;
    }

    public function setCompetencies(?string $competencies): void
    {
        $this->competencies = $competencies;
    }

    public function setDiploma(?string $diploma): void
    {
        $this->diploma = $diploma;
    }

    public function setInstitution(?string $institution): void
    {
        $this->institution = $institution;
    }

    public function setDiplomaLocation(?string $diplomaLocation): void
    {
        $this->diplomaLocation = $diplomaLocation;
    }

    public function setDateDebutDiploma(?DateTime $dateDebutDiploma): void
    {
        $this->dateDebutDiploma = $dateDebutDiploma;
    }

    public function setDateFinDiploma(?DateTime $dateFinDiploma): void
    {
        $this->dateFinDiploma = $dateFinDiploma;
    }
    
}
?>