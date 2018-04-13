<?php
class RegistrationForm 
{
	private $email;
	private $login;
	private $password;
	private $ConfirmPassword;

	function __construct(Array $data)
    {
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->login = isset($data['login']) ? $data['login'] : null;
        $this->password = isset($data['password']) ? $data['password'] : null;
        $this->ConfirmPassword = isset($data['ConfirmPassword']) ? $data['ConfirmPassword'] : null;
    }

	public function validate()
	{
		return !empty($this->email) && !empty($this->login) && !empty($this->password) && !empty($this->ConfirmPassword) && $this->passwordsMatch();
	}

	public function passwordsMatch()
	{
		return $this->password == $this->ConfirmPassword;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getConfirmPassword()
	{
		return $this->ConfirmPassword;
	}

	public function setConfirmPassword($ConfirmPassword)
	{
		$this->ConfirmPassword = $ConfirmPassword;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getlogin()
	{
		return $this->login;
	}

	public function setlogin($login)
	{
		$this->login = $login;
	}
}