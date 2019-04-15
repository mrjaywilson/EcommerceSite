<?php
namespace models;

class Product
{
    private $id;
    private $name;
    private $category;
    private $description;
    private $sku;
    private $cost;
    
    public function __construct(
        $id,
        $name,
        $category,
        $description,
        $sku,
        $cost) {
        
            $this->id = $id;
            $this->name = $name;
            $this->category = $category;
            $this->description = $description;
            $this->sku = $sku;
            $this->cost->$cost;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }
    
    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * @param mixed $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }
    
    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }
    
}