<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Repository\studentRepository;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\connectionCreator;
use DateTimeImmutable;
use DateTimeInterface;
use http\Exception\RuntimeException;
use PDO;
use PDOStatement;

class PdoStudentRepository implements studentRepository
{
    //Referencia da conecao
    private PDO $connectionC;

    public function __construct(PDO $connection)
    {
        //Posso passa qualquer conecao de qualquer banco
        $this->connectionC = $connection;
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

    /*private function fillPhonesOf(Student $student) : void
    {
        $stdmet = $this->connectionC->prepare("SELECT id,area_code, number FROM phones WHERE student_id = :id");
        $stdmet->bindValue(':id',$student->id(),PDO::PARAM_INT);
        $stdmet->execute();

        $phoneList = $stdmet->fetchAll(PDO::FETCH_ASSOC);

        foreach($phoneList as $phoneD)
        {
            $phone = new Phone(
                $phoneD['id'],
                $phoneD['number'],
                $phoneD['area_code']
            );

            $student->addPhone($phone);
        }
    }
    */
    public function studentsWithPhones(): array
    {
        $sqlQuery = "SELECT students.id,students.name,students.brith_date,phones.id AS phones_id,
                    phones.area_code,phones.number
                    FROM students
                    JOIN phones ON students.id = phones.students_id";

        $stdment = $this->connectionC->query($sqlQuery);
        $result = $stdment->fetchAll(PDO::FETCH_ASSOC);
        $studentList = [];

        foreach ($result as $row) {
            if (!array_key_exists($row['id'], $studentList)) {
                $studentList[$row['id']] = new Student(
                    $row['id'],
                    $row['name'],
                    new \DateTimeImmutable($row['birth_date'])
                );
            }
            $phone = new Phone($row['phone_id'], $row['area_code'], $row['number']);
            $studentList[$row['id']]->addPhone($phone);
        }

        return $studentList;
    }
}
    
