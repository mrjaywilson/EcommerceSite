<?php

class order {
    
    private $user_id;
    private $product_id;
    private $quantity;
    
    
    public function __construct($user_id, $product_id, $quantity) {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }
    
    
    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    
    
    
}