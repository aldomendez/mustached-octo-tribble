<?php 

/**
*  Bonder Down Times
*/
class Bonder
{
	
	function __construct($ip,$help='')
	{
		$this->ip = $ip;
		$this->file = "IP." . $this->ip . ".js";
		if (!$this->bonder_exists() && $help != 'registering') {
			throw new Exception("Bonder_dont_exist, assosiate a bonder with: ". $this->ip , 1);
		} elseif ($help=='registering') {
			file_put_contents($this->file, '');
		} else {
			$this->filecontents = json_decode(file_get_contents($this->file),true);
		}
	}

	public function save_bonder_data()
	{
		$this->filecontents = $_POST;
		file_put_contents($this->file, file_get_contents('php://input'));
	}

	public function get_bonder_data()
	{
		return json_encode($this->filecontents);
	}
	private function getName()
	{
		$this->bonder_exists();
	}

	private function bonder_exists()
	{
		return file_exists($this->file);
	}

}
