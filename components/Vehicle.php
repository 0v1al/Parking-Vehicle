<?php
		class Vehicle {

			public $category = '';
			public $vehicle_company = '';
			public $registration_number = 0;
			public $owner_name = '';
			public $owner_contact = 0;

			function __construct($category, $vehicle_company, $registration_number, $owner_name, $owner_contact) {
				$this->category = $category;
				$this->vehicle_company = $vehicle_company;
				$this->registration_number = $registration_number;
				$this->owner_name = $owner_name;
				$this->owner_contact = $owner_contact;
				// echo "constructor was called" . $category . ' ' . $vehicle_company;
			}

			function toString() {
				echo "Vehicle Category: " . $this->category . "<br>" . 
						"Vehicle Company: " . $this->vehicle_company . "<br>" .
						"Registration Number: " . $this->registration_number . "<br>" .
						"Owner Name: " . $this->owner_name . "<br>" .
						"Owner Contact: " . $this->owner_contact;
			}
		}
 ?>