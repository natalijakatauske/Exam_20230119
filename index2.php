<?php

include_once 'CinemaTicket.php';

$ticket = new CinemaTicket('Avatar', '13A', new Datetime('2023-01-22'), 10);
$ticket1 = new CinemaTicket('Scary Movie', '1C', new DateTime('2023-01-22'), 14);
$ticket2 = new CinemaTicket('Babilon', '25A', new Datetime('2023-01-27'), 8);

$standardPriceCalculator = new StandardPriceCalculator();
$subscriberPriceCalculator = new SubscriberPriceCalculator();
$newCustomerPriceCalculator = new NewCustomerPriceCalculator();


$orderProcessor = new OrderProcessor($standardPriceCalculator);
$orderProcessor->addItem($ticket);
$orderProcessor->addItem($ticket1);
$orderProcessor->addItem($ticket2);
echo 'Standart tickets price is: ' . $orderProcessor->calculateTotalPrice() . PHP_EOL;

$orderProcessor1 = new OrderProcessor($subscriberPriceCalculator);
$orderProcessor1->addItem($ticket);
$orderProcessor1->addItem($ticket1);
$orderProcessor1->addItem($ticket2);
echo 'Tickets price for subscribers with 10% discount: ' . $orderProcessor1->calculateTotalPrice() . PHP_EOL;

$orderProcessor2 = new OrderProcessor($newCustomerPriceCalculator);
$orderProcessor2->addItem($ticket);
$orderProcessor2->addItem($ticket1);
$orderProcessor2->addItem($ticket2);
echo 'Tickets price for new customer: ' . $orderProcessor2->calculateTotalPrice() . PHP_EOL;