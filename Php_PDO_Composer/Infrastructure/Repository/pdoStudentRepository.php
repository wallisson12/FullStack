<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Repository\studentRepository;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\connectionCreator;
use DateTimeImmutable;
use DateTimeInterface;
use PDO;
use PDOStatement;

class PdoStudentRepository implements studentRepository
{
    private PDO $connectionC;

    public function __construct()
    {
        $this->connectionC = connectionCreator::createConnection();
    }

    public function allStudents(): array
    {
        $stment = $this->connectionC->query("SELECT * FROM students");

        return $this->hydrateStudentList($stment);
    }
    public function studentBrithAt(DateTimeInterface $dateBrith) : array
    {
        $stment = $this->connectionC->prepare("SELECT * FROM students WHERE brith_date = :brith_date");
        $stment->bindValue(':brith_date',$dateBrith->format('Y-m-d'));
        $stment->execute();

        return $this->hydrateStudentList($stment);
    }

    public function update(Student $student) : bool
    {
        $stment = $this->connectionC->prepare("UPDATE students SET name = :name, brith_date = :brith_date WHERE id = :id") ;

        $stment->bindValue(':name',$student->name(),PDO::PARAM_STR);
        $stment->bindValue(':brith_date',$student->birthDate()->format('Y-m-d'));
        $stment->bindValue(':id',$student->id(),PDO::PARAM_INT);

        return $stment->execute();
        
    }

    public function save(Student $student) : bool
    {
        if($student->id() === null)
        {
            return $this->insere($student);
        }

        return $this->update($student);
    }

    public function insere(Student $student) : bool
    {
        $stment = $this->connectionC->prepare("INSERT INTO (name,brith_date) VALUES (:name,:brith_date)");
        $stment->bindValue(':name',$student->name(), PDO::PARAM_STR);
        $stment->bindValue(':brith_date',$student->birthDate()->format('Y-m-d'));

        $sucess = $stment->execute();

        if($sucess)
        {
            //Vai pegar o id la do banco e colocar no objeto estudante
            $student->defineId($this->connectionC->lastInsertId());
        }

        return $sucess;
    }
    public function remove(Student $student) : bool
    {
        $stment = $this->connectionC->prepare("DELETE FROM students WHERE id = ?");
        $stment->bindValue(1,$student->id(),PDO::PARAM_INT);
        return $stment->execute();
    }  

    public function hydrateStudentList(PDOStatement $stmt) : array
    {   
        $studentDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listS = [];
        
        foreach($studentDataList as $student)
        {
            $listS[] = new Student(
                $student['id'],
                $student['name'],
                new DateTimeImmutable($student['brith_date'])
            );
        }

        return $listS;
    }
}
    
