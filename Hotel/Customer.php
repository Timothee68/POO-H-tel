<?php 
class Customer{
    private String $name;
    private string $firstName;
	private string $email;
	private string $tel;
	private array $reservations;


    public function __construct(string $name,string $firstName,string $email,string $tel)
	{
        $this->name = $name;
        $this->firstName = $firstName;
		$this->email = $email;
		$this->tel = $tel;
		$this->reservations = [];
    }
       
       
	/**
	 * 
	 * @return string
	 */
	function getName(): string 
	{
		return $this->name;
	}
	
	/**
	 * 
	 * @param string $name 
	 * @return Customer
	 */
	function setName(string $name): self 
	{
		$this->name = $name;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getFirstName(): string 
	{
		return $this->firstName;
	}
	
	/**
	 * 
	 * @param string $firstName 
	 * @return Customer
	 */
	function setFirstName(string $firstName): self 
	{
		$this->firstName = $firstName;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getEmail(): string 
	{
		return $this->email;
	}
	
	/**
	 * 
	 * @param string $email 
	 * @return Customer
	 */
	function setEmail(string $email): self 
	{
		$this->email = $email;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getTel(): string {
		return $this->tel;
	}
	
	/**
	 * 
	 * @param string $tel 
	 * @return Customer
	 */
	function setTel(string $tel): self 
	{
		$this->tel = $tel;
		return $this;
	}
	/**
	 * 
	 * @return array
	 */
	function getReservations(): array 
	{
		return $this->reservations;
	}
	
	/**
	 * 
	 * @param array $reservations 
	 * @return Customer
	 */
	function setReservations(array $reservations): self 
	{
		$this->reservations= $reservations;
		return $this;
	}

     // on ajoute a chaque réservation la dite réservation dans un tableau avec un array push 
    public function addReservation(Reservation $reservation)
    {
        $this->reservations[]= $reservation;
    }

	// pour quitter une bedroom on passe le status a false
	public function leaveRoom(Bedroom $bedroom)
	{	
		$bedroom->setRoomStatus(false);
	}

	// pour annuler une réservation 
	public function cancelReservation(Reservation $reservation)
	{	
		foreach($this->reservations as $key => $resa)
		{
			if($resa->getBedroom()->getPrice() == $resa->getBedroom()->getPrice())
			{
				$resa->getBedroom()->setRoomStatus(false);
				unset($this->reservations[$key]);
			}
			return "réservation annulée";
		}	
	}



    // on montre les réservations du client en cour
    public function showReservation()
    {
		$resultReservation = "<h3>Réservation de $this</h3></br>";
		$totalCost=0;
		if(count($this->reservations) == 0){
			return $resultReservation."aucune réservation !<hr>";
		} else
		{
			$resultReservation .= "<span>".count($this->reservations)."réservation(s)</br></span>";
			foreach($this->reservations as $res)
			{
				$resultReservation .="$res</br>"; // $res = to string de reservation
				$totalCost+=$res->getBedroom()->getPrice()*$res->getDay();	
			}
				return $resultReservation."total : ".$totalCost."<hr>";
		}
    }

    public function __toString()
    {
        return $this->name." ".$this->firstName;
    }
}