<?php

require_once('User.php');

class Movie
{
    private int $id;
    private string $title;
    private string $director;
    private string $synopsis;
    private string $type;
    private string $scriptwriter;
    private string $production_company;
    private string $release_date;
    private User $creator;
    private ?string $cover = null;

    public function __construct(string $title, string $director, string $synopsis, string $type, string $scriptwriter, string $production_company, string $release_date, User $creator, ?int $id = null)
    {
        if ($id) {
            $this->id = $id;
        }

        $this->title = $title;
        $this->director = $director;
        $this->synopsis = $synopsis;
        $this->type = $type;
        $this->scriptwriter = $scriptwriter;
        $this->production_company = $production_company;
        $this->release_date = $release_date;
        $this->creator = $creator;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getScriptwriter(): string
    {
        return $this->scriptwriter;
    }

    public function getProductionCompany(): string
    {
        return $this->production_company;
    }

    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    public function getCreator(): User
    {
        return $this->creator;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setScriptwriter(string $scriptwriter): self
    {
        $this->scriptwriter = $scriptwriter;

        return $this;
    }

    public function setProductionCompany(string $production_company): self
    {
        $this->production_company = $production_company;

        return $this;
    }

    public function setReleaseDate(string $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function setCreator(User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }
}
