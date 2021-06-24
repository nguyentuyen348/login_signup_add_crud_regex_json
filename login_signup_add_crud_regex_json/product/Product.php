<?php


class Product
{
    public int $id;
    public string $name;
    public int $price;
    public string $image;
    public string $detail;

    public function __construct(int $id, string $name, int $price, string $image, string $detail)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->detail = $detail;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getPrice(): int
    {
        return $this->price;
    }


    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getImage(): string
    {
        return $this->image;
    }


    public function setImage(string $image): void
    {
        $this->image = $image;
    }


    public function getDetail(): string
    {
        return $this->detail;
    }


    public function setDetail(string $detail): void
    {
        $this->detail = $detail;
    }



}