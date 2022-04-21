<?php

class Reservation{

    private Customer $customer; 
	private Bedroom $bedroom;
	private DateTime $entryDate;
	private DateTime $releaseDate;
	private $day;

    public function __construct(Customer $customer,Bedroom $bedroom,string $entryDate,string $releaseDate)
    {
		if(!$bedroom->getRoomStatus())
		{
			$this->customer = $customer;
			$this->bedroom = $bedroom;
			$hotel = $bedroom->getHotel();
			$customer->addReservation($this);
			$hotel->addReservation($this);
			$bedroom->setRoomStatus(true);
			$this->entryDate= new DateTime($entryDate);
			$this->releaseDate= new DateTime($releaseDate);
			$this->day = $this->entryDate->diff($this->releaseDate)->format('%d');
		} else {
			echo "Réservation impossbile";
			return;
		}
    }
	/**
	 * 
	 * @return Customer
	 */
	function getCustomer(): Customer {
		return $this->customer;
	}
	
	/**
	 * 
	 * @param Customer $customer 
	 * @return Reservation
	 */
	function setCustomer(Customer $customer): self {
		$this->customer = $customer;
		return $this;
	}
	/**
	 * 
	 * @return Bedroom
	 */
	function getBedroom(): Bedroom {
		return $this->bedroom;
	}
	
	/**
	 * 
	 * @param Bedroom $bedroom 
	 * @return Reservation
	 */
	function setBedroom(Bedroom $bedroom): self {
		$this->bedroom = $bedroom;
		return $this;
	}
	/**
	 * 
	 * @return DateTime
	 */
	function getEntryDate(): DateTime {
		return $this->entryDate;
	}
	
	/**
	 * 
	 * @param DateTime $entryDate 
	 * @return Reservation
	 */
	function setEntryDate(DateTime $entryDate): self {
		$this->entryDate = $entryDate;
		return $this;
	}
	/**
	 * 
	 * @return DateTime
	 */
	function getReleaseDate(): DateTime {
		return $this->releaseDate;
	}
	
	/**
	 * 
	 * @param DateTime $releaseDate 
	 * @return Reservation
	 */
	function setReleaseDate(DateTime $releaseDate): self {
		$this->releaseDate = $releaseDate;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getDay() {
		return $this->day;
	}
	
	/**
	 * 
	 * @param mixed $day 
	 * @return Reservation
	 */
	function setDay($day): self {
		$this->day = $day;
		return $this;
	}

    public function __tostring()
    {
        return "<strong> Hotel : ".$this->bedroom->getHotel()."</strong>".$this->bedroom." du ".$this->entryDate->format('d-m-Y')." au ".$this->releaseDate->format('d-m-Y');
    }
}