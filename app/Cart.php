<?php

namespace App;

class Cart
{
    private $pizzas;
    private $totalQty = 0;
    private $totalPrice = 0;

    public function getPizzas(){
        return $this->pizzas;
    }

    public function getTotalQty(){
        return $this->totalQty;
    }

    public function getTotalPrice(){
        return $this->totalPrice;
    }

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->pizzas = $oldCart->pizzas;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($pizza,$id)
    {
        $pizzaArray[] = '';
        $storedPizza = ['qty' => 0, 'price' => $pizza->price, 'pizza' => $pizza];
        if ($this->pizzas) {

            if (array_key_exists($id, $this->pizzas)) {
                $storedPizza = $this->pizzas[$id];
            }
        }
        $storedPizza['qty']++;
        $storedPizza['price'] = $storedPizza['qty'] * $pizza->price;
        $this->pizzas[$id] = $storedPizza;
        $this->totalQty++;
        $this->totalPrice += $pizza->price;

    }

    public function reduceByOne($id)
    {
        $this->pizzas[$id]['qty']--;
        $this->pizzas[$id]['price'] -=  $this->pizzas[$id]['pizza']['price'];
        $this->totalQty--;
        $this->totalPrice -=  $this->pizzas[$id]['pizza']['price'];
        if($this->pizzas[$id]['qty']<= 0){
            unset($this->pizzas[$id]);
        }

    }

    public static  function getEur()
    {
        $req_url = 'https://api.exchangerate-api.com/v4/latest/USD';
        $response_json = file_get_contents($req_url);

        $response_object = json_decode($response_json);
        $eur = $response_object->rates->EUR;


        return $eur;

    }







}
