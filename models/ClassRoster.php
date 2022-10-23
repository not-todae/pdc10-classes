<?php

namespace Models;
use \PDO;

class ClassRoster
{
    protected $id;
    protected $class_code;
    protected $student_number;
    protected $connection;

    public function __construct($class_code, $student_number)
    {
        $this->class_code = $class_code;
        $this->student_number = $student_number;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getCode()
    {
        return $this->class_code;
    }
    public function getStudentNumber()
    {
        return $this->student_number;
    }
    public function setConnection($connection)
    {
        return $this->connection = $connection;
    }
    public function viewRoster($class_code)
	{
		try {
            $sql = "SELECT * FROM class_rosters INNER JOIN students on class_rosters.student_number=students.student_number WHERE class_code=:class_code";

            $statement = $this->connection->prepare($sql);
			$statement->execute([
				':class_code' => $class_code
			]);

            return $statement->fetchAll();

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    public function insertRoster()
    {
		try {
			$sql = "INSERT INTO class_rosters SET class_code=:class_code, student_number=:student_number";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':class_code' => $this->getCode(),
                ':student_number' => $this->getStudentNumber(),
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}
    public function getById($id)
	{
        try {
			$sql = 'SELECT * FROM class_rosters WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->class_code = $row['class_code'];
			$this->description = $row['description'];
			$this->enrolled_at = $row['enrolled_at'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    public function update($class_code, $student_number, $enrolled_at)
	{
		try {
			$sql = 'UPDATE class_rosters SET class_code=?, student_number=?, enrolled_at=?, WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$class_code,
                $student_number,
                $enrolled_at,
				$this->getID()
			]);
			$this->class_code = $class_code;
			$this->student_number = $student_number;
            $this->enrolled_at = $enrolled_at;
            
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}    
    public function delete()
	{
		try {
			$sql = 'DELETE FROM class_rosters WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
    }
    public function getAll()
    {
		try {
			$sql = 'SELECT * FROM class_rosters';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}