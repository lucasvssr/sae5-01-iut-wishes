<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\CoursesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CoursesRepository::class)]
#[ApiResource]
#[Get]
#[GetCollection]
#[Post(security: "is_granted('ROLE_ADMIN')")]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?bool $isLES = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $maxGroups = null;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Wish::class)]
    private Collection $wishes;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Affectation::class)]
    private Collection $affectations;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subject $subject = null;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Hour::class)]
    private Collection $hours;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    public function __construct()
    {
        $this->wishes = new ArrayCollection();
        $this->affectations = new ArrayCollection();
        $this->hours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMaxGroups(): ?int
    {
        return $this->maxGroups;
    }

    public function setMaxGroups(int $maxGroups): static
    {
        $this->maxGroups = $maxGroups;

        return $this;
    }

    /**
     * @return Collection<int, Wish>
     */
    public function getWishes(): Collection
    {
        return $this->wishes;
    }

    public function addWish(Wish $wish): static
    {
        if (!$this->wishes->contains($wish)) {
            $this->wishes->add($wish);
            $wish->setCourse($this);
        }

        return $this;
    }

    public function removeWish(Wish $wish): static
    {
        if ($this->wishes->removeElement($wish)) {
            // set the owning side to null (unless already changed)
            if ($wish->getCourse() === $this) {
                $wish->setCourse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Affectation>
     */
    public function getAffectations(): Collection
    {
        return $this->affectations;
    }

    public function addAffectation(Affectation $affectation): static
    {
        if (!$this->affectations->contains($affectation)) {
            $this->affectations->add($affectation);
            $affectation->setCourse($this);
        }

        return $this;
    }

    public function removeAffectation(Affectation $affectation): static
    {
        if ($this->affectations->removeElement($affectation)) {
            // set the owning side to null (unless already changed)
            if ($affectation->getCourse() === $this) {
                $affectation->setCourse(null);
            }
        }

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): static
    {
        $this->subject = $subject;

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
            $hour->setCourse($this);
        }

        return $this;
    }

    public function removeHour(Hour $hour): static
    {
        if ($this->hours->removeElement($hour)) {
            // set the owning side to null (unless already changed)
            if ($hour->getCourse() === $this) {
                $hour->setCourse(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }
}
