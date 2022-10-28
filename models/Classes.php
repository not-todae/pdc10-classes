<?php

namespace Models;
use \PDO;

class Classes
{
    protected $id;
    protected $name;
    protected $description;
    protected $class_code;
    protected $employee_number;
    protected $connection;

    public function __construct($name, $description, $class_code, $employee_number)
    {
        $this->name = $name;
        $this->description = $description;
        $this->class_code = $class_code;
        $this->employee_number = $employee_number;

    }
    public function getID()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCode()
    {
        return $this->class_code;
    }
    public function getEmployeeNumber()
    {
        return $this->employee_number;
    }
    public function setConnection($connection)
    {
        return $this->connection = $connection;
    }
    public function insertClass()
    {
        try {
            $sql = "INSERT INTO classes SET name=:name, description=:description, class_code=:class_code, employee_number=:employee_number";
            $statement = $this->connection->prepare($sql);
            return $statement->execute([
                ':name'=>$this->getName(),
                ':description'=>$this->getDescription(),
                ':class_code'=>$this->getCode(),
                ':employee_number'=>$this->getEmployeeNumber()
			]);
            
        } catch (Exeption $e) {
            error_log($e->getMessage());
        }
    } 
    public function getById($id)
    {
        try {
            $sql = 'SELECT * FROM classes WHERE id=:id';
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':id' => $id
            ]);

            $row = $statement->fetch();

            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->class_code = $row['class_code'];
            $this->employee_number = $row['employee_number'];
            
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    public function update($name, $description, $class_code, $employee_number)
	{
		try {
			$sql = 'UPDATE classes SET name=?, description=?, class_code=?, employee_number=?  WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
                $name,
                $description,
                $class_code,
                $employee_number,
                $this->getID()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}    
    public function delete()
	{
		try {
			$sql = 'DELETE FROM classes WHERE id=?';
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
        try{
            $sql = 'SELECT classes.id, classes.name, classes.description, classes.class_code, teachers.first_name, teachers.last_name FROM classes INNER JOIN teachers ON classes.employee_number=teachers.employee_number';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        }catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}