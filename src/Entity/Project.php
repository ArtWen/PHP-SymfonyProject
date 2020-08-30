<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * Wygenerowane poprzez komendę php bin/console make:entity Project
 * Wartości niedomyślne:
 * user->relation->ManyToOne
 * description->text->non-null
 * date->datetime->non-null
 *
 * Vich\Uploadable - anotacja dodana później podczas implementacji dodawania plików, zgodnie z opisem vich bundle
 * przez Artur Wenda
 *
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 * @Vich\Uploadable
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $summary;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * dodane ręcznie po wygenerowaniu przez Artur Wenda
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var DateTimeInterface|null
     */
    private $updated;

    /**
     * dodane ręcznie po wygenerowaniu przez Artur Wenda. Nazwa obrazka zapisywana w bazie danych.
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(allowNull = true)
     * @var string|null
     */
    private $image;

    /**
     * dodane ręcznie po wygenerowaniu przez Artur Wenda. Pole potrzebne do uploadu pliku obrazka.
     * @Vich\UploadableField(mapping="project_image", fileNameProperty="image")
     * @var File|null
     */
    private $imageFile;


    /**
     * dodane ręcznie po wygenerowaniu przez Artur Wenda. Nazwa pakietu projektu zapisywana w bazie danych.
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(allowNull = true)
     * @var string|null
     */
    private $projectPackageName;

    /**
     * dodane ręcznie po wygenerowaniu przez Artur Wenda. Pole potrzebne do uploadu plików projektu (jako jeden pakiet np spakowany zip).
     * @Vich\UploadableField(mapping="project_files", fileNameProperty="projectPackageName")
     * @var File|null
     */
    private $projectPackage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


    // Getery oraz settery wygenerowane poprzez opcję generate getters and setters w PHP Storm IDE dla dodanych ręcznie pól
    // wygenerowane przez Artur Wenda

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdated(): ?DateTimeInterface
    {
        return $this->updated;
    }

    /**
     * @param DateTimeInterface|null $updated
     */
    public function setUpdated(?DateTimeInterface $updated): void
    {
        $this->updated = $updated;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * zmiana updated dodana ręcznie zgodnie z opisem użycia vich bundle.
     * @param File|null $imageFile
     * @throws Exception
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            $this->updated = new \DateTimeImmutable();
        }
    }

    /**
     * @return string|null
     */
    public function getProjectPackageName(): ?string
    {
        return $this->projectPackageName;
    }

    /**
     * @param string|null $projectPackageName
     */
    public function setProjectPackageName(?string $projectPackageName): void
    {
        $this->projectPackageName = $projectPackageName;
    }

    /**
     * @return File|null
     */
    public function getProjectPackage(): ?File
    {
        return $this->projectPackage;
    }

    /**
     * zmiana updated dodana ręcznie zgodnie z opisem użycia vich bundle.
     * @param File|null $projectPackage
     * @throws Exception
     */
    public function setProjectPackage(?File $projectPackage = null): void
    {
        $this->projectPackage = $projectPackage;
        if (null !== $projectPackage) {
            $this->updated = new \DateTimeImmutable();
        }
    }


    /**
     * dodane na potrzeby użycia array_unique
     */
    public function __toString() {
        return (string)$this->id;
    }

}
