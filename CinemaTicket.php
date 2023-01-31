<?php

class CinemaTicket
{
    private string $movieName;
    private string $place;
    private Datetime $dateTime;
    private float $price;

    public function __construct(string $movieName, string $place, DateTime $dateTime, float $price)
    {
        $this->movieName = $movieName;
        $this->place = $place;
        $this->dateTime = $dateTime;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

interface TotalCalculatorInterface
{
    public function calculatePrice(array $tickets): float; 
}

class StandardPriceCalculator implements TotalCalculatorInterface
{
    public function calculatePrice(array $tickets): float 
    {
        $sum = 0;
        foreach($tickets as $ticket) {
            $sum += $ticket->getPrice();
        }
        return $sum;
    }
}

class SubscriberPriceCalculator implements TotalCalculatorInterface
{
    public function calculatePrice(array $tickets): float 
    {
        $sum = 0;
        foreach($tickets as $ticket) {
            $sum += ($ticket->getPrice() * 0.9);
        }
        return $sum;
    }
}

class NewCustomerPriceCalculator implements TotalCalculatorInterface
{
    public function calculatePrice(array $tickets): float
    {
        $sum = 0;
        foreach($tickets as $key => $ticket) {
            if ($key === 0) {
                $firstTicketPrice = ($ticket->getPrice() * 0.8);
            } else {
                $sum += $ticket->getPrice();
            }
        }
        return $sum += $firstTicketPrice;
    }
}

class OrderProcessor
{
    private array $items = [];
    private TotalCalculatorInterface $calculator;

    public function __construct(TotalCalculatorInterface $calculator)
    {

        $this->calculator = $calculator;
    }

    public function addItem(CinemaTicket $items)
    {
        return $this->items[] = $items;
    }

    public function getList(): array
    {
        return $this->items;
    }

    public function calculateTotalPrice(): float
    {
        return $this->calculator->calculatePrice($this->items);
    }
}