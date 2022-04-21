

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>POO Hôtel</title>
</head>
<body>
    <div class="container">
    <?php 
include "Customer.php";
include "Hotel.php";
include "Bedroom.php";
include "Reservation.php";
    $customer1=new Customer("GIBELLO","Virgile","06.......","gibello@exemple.com");
    $customer2=new Customer("MURMANN","Mickael","06...","mumrann@exemple.com");

    $hotel_1=new Hotel("Hilton****Strasbourg","10 route de la Gare"," 67000", "STRASBOURG");
    $hotel_2=new Hotel("Hôtel Regent**** Paris","3 chemin de la Liberté", "75000", "PARIS");

    $room1=new Bedroom($hotel_1,"chambre n°1",2,120,false,false);
    $room2=new Bedroom($hotel_1,"chambre n°2",2,120,false,false);
    $room3=new Bedroom($hotel_1,"chambre n°3",2,120,false,false);
    $room16=new Bedroom($hotel_1,"chambre n°16",2,300,true,false);
    $room17=new Bedroom($hotel_1,"chambre n°17",2,300,true,false);
    $room18=new Bedroom($hotel_1,"chambre n°18",2,300,true,false);
    $room19=new Bedroom($hotel_1,"chambre n°19",2,300,true,false);

    $reservation1=new Reservation($customer1,$room17,"2021-01-01", "2021-01-02");
    $reservation2=new Reservation($customer2,$room2,"2021-03-11","2021-03-15");
    $reservation3=new Reservation($customer2,$room3,"2021-04-01","2021-04-17");



    echo $hotel_1."</br>";
    echo $hotel_1->infoHotel();
    echo $hotel_1->showReservation()."</br>";
    echo $hotel_2->showReservation()."</br>";

    echo $customer1->showReservation()."</br>";
    echo $customer2->showReservation()."</br>";

    echo $hotel_1->showBedroom()."</br>";
    // echo $hotel_2->showBedroom()."</br>";
    // echo $customer1->cancelReservation($reservation1);
    // echo $customer2->cancelReservation($reservation2);
    // echo $customer2->cancelReservation($reservation2);

    // // echo $customer2->leaveRoom($room2); 
    // // echo $hotel_1->showBedroom()."</br>";
    // echo $customer2->showReservation()."</br>";
    // echo $customer1->showReservation();
    // echo $hotel_1->showBedroom()."</br>";



?>
        </div>
    </body>
</html>





