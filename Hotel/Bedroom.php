<?php
class Bedroom {
    
    private Hotel $hotel;  
	private string $roomNb;      
    private int $nbBed ;         
    private bool $wifi;             
    private bool $roomStatus;       
    private int $price;
	private static  array $chambre; 
	            // Le fait de déclarer des propriétés ou des méthodes comme statiques vous permet d'y accéder sans avoir besoin d'instancier la classe. Ceci peuvent être accédé statiquement depuis une instance d'objet.

    public function __construct(Hotel $hotel,string $roomNb,int $nbBed,int $price ,bool $wifi=true,bool $roomStatus=false)
	{	
		$this->hotel=$hotel;
        $this->roomNb=$roomNb;
        $this->nbBed=$nbBed;
        $this->wifi=$wifi;
        $this->roomStatus=$roomStatus;
        $this->price=$price;
		self :: $chambre[]=$this;
        $hotel->addBedRoom($this);
    }

   
	/**
	 * 
	 * @return Hotel
	 */
	function getHotel(): Hotel 
	{
		return $this->hotel;
	}
	
	/**
	 * 
	 * @param Hotel $hotel 
	 * @return Bedroom
	 */
	function setHotel(Hotel $hotel): self 
	{
		$this->hotel = $hotel;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getRoomNb(): string 
	{
		return $this->roomNb;
	}
	
	/**
	 * 
	 * @param string $roomNb 
	 * @return Bedroom
	 */
	function setRoomNb(string $roomNb): self 
	{
		$this->roomNb = $roomNb;
		return $this;
	}
	/**
	 * 
	 * @return int
	 */
	function getNbBed(): int 
	{
		return $this->nbBed;
	}
	
	/**
	 * 
	 * @param int $nbBed 
	 * @return Bedroom
	 */
	function setNbBed(int $nbBed): self 
	{
		$this->nbBed = $nbBed;
		return $this;
	}
	/**
	 * 
	 * @return bool
	 */
	function getWifi(): bool 
	{
		return $this->wifi;
	}
	
	/**
	 * 
	 * @param bool $wifi 
	 * @return Bedroom
	 */
	function setWifi(bool $wifi): self 
	{
		$this->wifi = $wifi;
		return $this;

	}
	/**
	 * 
	 * @return bool
	 */
	function getRoomStatus(): bool 
	{
		return $this->roomStatus;
	}
	
	/**
	 * 
	 * @param bool $roomStatus 
	 * @return Bedroom
	 */
	function setRoomStatus(bool $roomStatus): self 
	{
		$this->roomStatus = $roomStatus;
		return $this;
	}
	/**
	 * 
	 * @return int
	 */
	function getPrice(): int 
	{
		return $this->price;
	}
	
	/**
	 * 
	 * @param int $price 
	 * @return Bedroom
	 */
	function setPrice(int $price): self 
	{
		$this->price = $price;
		return $this;
	}
	
	/**
	 * 
	 * @return array
	 */
	static function getChambre(): array 
	{
		return self::$chambre;
	}
   
	public function getInfoWifi()
	{
		$isWifi = ($this->wifi)? "<i class='fa-solid fa-wifi'></i> " : " "; // si this wifi =true oui sinon non 
		return $isWifi;
	}
	public function getInfoReserved()
	{
		$status = ($this->roomStatus)? "<span id='red'>Réservée</span>" : "<span>Disponible</span>" ;
		return $status;
	}
    public function __toString()
    {
		$isWifi = ($this->wifi)? "oui " : "non"; // si this wifi =true oui sinon non 
		return " - ".$this->roomNb." ( ".$this->nbBed." lits - ".$this->price." € - wifi :".$isWifi."</br>";
    }

	
}