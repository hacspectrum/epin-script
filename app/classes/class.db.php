<?php
/*
* Static PDO MySQL DB Class
*
* Sadece ihtiyaç duyulduðunda MySQL
* baðlantýsý yapan ve rahat bir þekilde
* kullanabileceðiniz bir static PDO sýnýfý.
*
*/

class DB {

	/*
	* PDO sýnýf örneðinin barýnacaðý deðiþken
	*/
	static $pdo = null;

	/*
	* Kullanacaðýmýz veritabaný karakter seti
	*/
	static $charset = 'UTF8';

	/*
	* Son yapýlan sorguyu saklar
	*/
	static $last_stmt = null;

	/*
	* PDO örneðini yoksa oluþturan, varsa
	* oluþturulmuþ olaný döndüren metot
	*/
	public static function instance()
	{
		return
			self::$pdo == null ?
				self::init() :
				self::$pdo;
	}

	/*
	* PDO'yu tanýmlayan ve baðlantýyý
	* kuran metot
	*/
	public static function init()
	{
		self::$pdo = new PDO(
			'mysql:host=' . MYSQL_HOST .';dbname=' . MYSQL_DB,
			MYSQL_USER,
			MYSQL_PASS
		);

		self::$pdo->exec('SET NAMES `' . self::$charset . '`');
		self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

		return self::$pdo;
	}

	/*
	* PDO'nun query metoduna bindings
	* ilave edilmiþ metot
	*/
	public static function query($query, $bindings = null)
	{
		if(is_null($bindings))
		{
			if(!self::$last_stmt = self::instance()->query($query))
				return false;
		}
		else
		{
			self::$last_stmt = self::prepare($query);
			if(!self::$last_stmt->execute($bindings))
				return false;
		}

		return self::$last_stmt;
	}

	/*
	* Yapýlan sorgunun ilk satýrýnýn
	* ilk deðerini döndüren metod
	*/
	public static function getVar($query, $bindings = null)
	{
		if(!$stmt = self::query($query, $bindings))
			return false;

		return $stmt->fetchColumn();
	}

	/*
	* Yapýlan sorgunun ilk satýrýný
	* döndðren metod
	*/
	public static function getRow($query, $bindings = null)
	{
		if(!$stmt = self::query($query, $bindings))
			return false;

		return $stmt->fetch();
	}

	/*
	* Yapýlan sorgunun tüm satýrlarýný
	* döndüren metod
	*/
	public static function get($query, $bindings = null)
	{
		if(!$stmt = self::query($query, $bindings))
			return false;

		$result = array();

		foreach($stmt as $row)
			$result[] = $row;

		return $result;
	}

	/*
	* Query metodu ile ayný iþlemi yapar
	* fakat etkilenen satýr sayýsýný
	* döndürür
	*/
	public static function exec($query, $bindings = null)
	{
		if(!$stmt = self::query($query, $bindings))
			return false;

		return $stmt->rowCount();
	}

	/*
	* Query metodu ile ayný iþlemi yapar
	* fakat son eklenen ID'yi döndürür
	*/
	public static function insert($query, $bindings = null)
	{
		if(!$stmt = self::query($query, $bindings))
			return false;

		return self::$pdo->lastInsertId();
	}


	/*
	* Son gerçekleþen sorgudaki (varsa)
	* hatayý döndüren metod
	*/
	public static function getLastError()
	{
		$error_info = self::$last_stmt->errorInfo();

		if($error_info[0] == 00000)
			return false;

		return $error_info;
	}

	/*
	* Statik olarak çaðýrýlan ve yukarýda olmayan
	* tüm metodlarý PDO'da çaðýran sihirli metot
	*/
	public static function __callStatic($name, $arguments)
	{
		return call_user_func_array(
			array(self::instance(), $name),
			$arguments
		);
	}
}
