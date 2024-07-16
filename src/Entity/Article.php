<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[Broadcast]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column (options: ['unsigned' => true])]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $Title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $CreateDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $UpdateDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $PublishedDate = null;

    #[ORM\Column(type: Types::SMALLINT,
        options: ['unsigned' => true, 'default' => 0])]
    private ?int $IsPublished = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(string $Text): static
    {
        $this->Text = $Text;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->CreateDate;
    }

    public function setCreateDate(\DateTimeInterface $CreateDate): static
    {
        $this->CreateDate = $CreateDate;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->UpdateDate;
    }

    public function setUpdateDate(?\DateTimeInterface $UpdateDate): static
    {
        $this->UpdateDate = $UpdateDate;

        return $this;
    }

    public function getPublishedDate(): ?\DateTimeInterface
    {
        return $this->PublishedDate;
    }

    public function setPublishedDate(?\DateTimeInterface $PublishedDate): static
    {
        $this->PublishedDate = $PublishedDate;

        return $this;
    }

    public function getIsPublished(): ?int
    {
        return $this->IsPublished;
    }

    public function setIsPublished(int $IsPublished): static
    {
        $this->IsPublished = $IsPublished;

        return $this;
    }
}
