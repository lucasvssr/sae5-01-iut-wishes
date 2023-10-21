<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\WeekRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: WeekRepository::class)]
#[ApiResource]
#[Get]
#[GetCollection]
#[Put(security: "is_granted('ROLE_ADMIN')")]
#[Patch(security: "is_granted('ROLE_ADMIN')")]
#[Post(security: "is_granted('ROLE_ADMIN')")]
class Week
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $number = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?bool $isHoliday = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?bool $isApprenticeship = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?bool $isInternship = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?bool $isLES = null;

    #[ORM\OneToMany(mappedBy: 'week', targetEntity: Hour::class)]
    private Collection $hours;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Semester $semester = null;

    public function __construct()
    {
        $this->hours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function isHoliday(): ?bool
    {
        return $this->isHoliday;
    }

    public function setIsHoliday(bool $isHoliday): static
    {
        $this->isHoliday = $isHoliday;

        return $this;
    }

    public function isApprenticeship(): ?bool
    {
        return $this->isApprenticeship;
    }

    public function setIsApprenticeship(bool $isApprenticeship): static
    {
        $this->isApprenticeship = $isApprenticeship;

        return $this;
    }

    public function isInternship(): ?bool
    {
        return $this->isInternship;
    }

    public function setIsInternship(bool $isInternship): static
    {
        $this->isInternship = $isInternship;

        return $this;
    }

    public function isLES(): ?bool
    {
        return $this->isLES;
    }

    public function setIsLES(bool $isLES): static
    {
        $this->isLES = $isLES;

        return $this;
    }

    /**
     * @return Collection<int, Hour>
     */
    public function getHours(): Collection
    {
        return $this->hours;
    }

    public function addHour(Hour $hour): static
    {
        if (!$this->hours->contains($hour)) {
            $this->hours->add($hour);
            $hour->setWeek($this);
        }

        return $this;
    }

    public function removeHour(Hour $hour): static
    {
        if ($this->hours->removeElement($hour)) {
            // set the owning side to null (unless already changed)
            if ($hour->getWeek() === $this) {
                $hour->setWeek(null);
            }
        }

        return $this;
    }

    public function getSemester(): ?Semester
    {
        return $this->semester;
    }

    public function setSemester(?Semester $semester): static
    {
        $this->semester = $semester;

        return $this;
    }
}
