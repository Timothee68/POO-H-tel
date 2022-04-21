<?php
class Hotel{
    private string $name;                  
    private string $address;
	private string $cp;
	private string $city;               
    private array $bedrooms;             
	private  array $reservations;
	private int $totalBedroom ;
	
    
   

    public function __construct(string $name,string $address,string $cp, string $city){  
        $this->name = $name;
        $this->address =$address ;
		$this->cp = $cp;
		$this->city =$city;
        $this->bedrooms = [] ; 
		$this->reservations = [];
		$this->totalBedroom =30;
				              
    }

   
	/**
	 * 
	 * @return string
	 */
	function getName(): string {
		return $this->name;
	}
	
	/**
	 * 
	 * @param string $name 
	 * @return Hotel
	 */
	function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getAddress(): string {
		return $this->address;
	}
	
	/**
	 * 
	 * @param string $address 
	 * @return Hotel
	 */
	function setAddress(string $address): self {
		$this->address = $address;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getCp(): string {
		return $this->cp;
	}
	
	/**
	 * 
	 * @param string $cp 
	 * @return Hotel
	 */
	function setCp(string $cp): self {
		$this->cp = $cp;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getCity(): string {
		return $this->city;
	}
	
	/**
	 * 
	 * @param string $city 
	 * @return Hotel
	 */
	function setCity(string $city): self {
		$this->city = $city;
		return $this;
	}
	/**
	 * 
	 * @return array
	 */
	function getBedrooms(): array {
		return $this->bedrooms;
	}
	
	/**
	 * 
	 * @param array $bedrooms 
	 * @return Hotel
	 */
	function setBedrooms(array $bedrooms): self {
		$this->bedrooms = $bedrooms;
		return $this;
	}
	/**
	 * 
	 * @return array
	 */
	function getReservations(): array {
		return $this->reservations;
	}
	
	/**
	 * 
	 * @param array $reservations 
	 * @return Hotel
	 */
	function setReservations(array $reservations): self {
		$this->reservations = $reservations;
		return $this;
	}
		/**
	 * 
	 * @return int
	 */
	function getTotalBedroom(): int {
		return $this->totalBedroom;
	}
	
	/**
	 * 
	 * @param int $totalBedroom 
	 * @return Hotel
	 */
	function setTotalBedroom(int $totalBedroom): self {
		$this->totalBedroom = $totalBedroom;
		return $this;
	}
    public function addBedroom(Bedroom $bedroom) // on ajoute un objet chambre a chaque instanciation d'un objet 
    {
        $this->bedrooms[]= $bedroom;
    }
    public function showBedroom()
    {
		echo "<h3>Status des chambres de $this->name</h3<br/>",
		"<table>" ,
			"<thead>",
			"<tr>",
				"<th>Chambre</th>",
				"<th>prix</th>",
				"<th>Wifi</th>",
				"<th>ETAT</th>",
			"</tr>",
		"</thead>",
		"<tbody>";
		
        foreach($this->bedrooms as $bedroom )
        {
			echo 	"<tr>",
						"<th>".$bedroom->getRoomNb()."</th>",
						"<th>".$bedroom->getPrice()."€</th>",
						"<th>".$bedroom->getInfoWifi()."</th>",
						"<th>".$bedroom->getInfoReserved()."</th>",
						"</tbody>",
						"</table";
		}
			
    }
    public function addReservation(Reservation $reservation)
    {
        $this->reservations[]= $reservation;
	}

	public function cancelReservation(Reservation $reservation)
	{	
		
	}
    public function showReservation()
    {	
        $showReservationHotel=""; // la variable prend comme valeur un string 
		$showReservationHotel = "<h3>Réservation de $this</h3>";

		if(count($this->reservations) == 0){
			return $showReservationHotel."aucune réservation !<hr>";
		} else
			{
				$showReservationHotel .= "<span>".count($this->reservations)." réservation(s)</br></span>";
				foreach($this->reservations as $res)
				{
					$showReservationHotel .=$res->getCustomer()." ".$res->getBedroom()."</br>"; // $res = to string de reservation
				}
				return  $showReservationHotel."<hr>"."</br";
			
			}
	}
	// $showReservationHotel;
	public function infoHotel(){
		return $this->address." ".$this->cp." ".$this->city."</br>"."Nombre de chambre : ".$this->totalBedroom."</br>"." Nombre de chambres réservée : ".count($this->reservations)."</br>"." Nombres de chambre disponible".($this->totalBedroom-count($this->reservations))."</br></br>";
	}
    public function __tostring()
    {
        return "<strong>$this->name</strong>";
    }

}


