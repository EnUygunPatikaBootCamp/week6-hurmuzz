<?php

namespace App\Entity;

use App\Repository\UrunBilgileriRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UrunBilgileriRepository::class)]
class UrunBilgileri
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $urunAdi = null;

    #[ORM\Column(length: 255)]
    private ?string $urunAciklamasi = null;

    #[ORM\Column]
    private ?int $urunAdedi = null;

    #[ORM\Column]
    private ?int $urunFiyati = null;

    #[ORM\Column]
    private ?\DateTime $urunKayitTarihi = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrunAdi(): ?string
    {
        return $this->urunAdi;
    }

    public function setUrunAdi(string $urunAdi): self
    {
        $this->urunAdi = $urunAdi;

        return $this;
    }

    public function getUrunAciklamasi(): ?string
    {
        return $this->urunAciklamasi;
    }

    public function setUrunAciklamasi(string $urunAciklamasi): self
    {
        $this->urunAciklamasi = $urunAciklamasi;

        return $this;
    }

    public function getUrunAdedi(): ?int
    {
        return $this->urunAdedi;
    }

    public function setUrunAdedi(int $urunAdedi): self
    {
        $this->urunAdedi = $urunAdedi;

        return $this;
    }

    public function getUrunFiyati(): ?int
    {
        return $this->urunFiyati;
    }

    public function setUrunFiyati(int $urunFiyati): self
    {
        $this->urunFiyati = $urunFiyati;

        return $this;
    }

    public function getUrunKayitTarihi(): ?\DateTime
    {
        return $this->urunKayitTarihi;
    }

    public function setUrunKayitTarihi(?\DateTime $urunKayitTarihi): self
    {
        $this->urunKayitTarihi = $urunKayitTarihi;

        return $this;
    }

}
