<?php

namespace Alura\Pdo\Domain\Repository;

use Alura\Pdo\Domain\Model\Student;
use DateTimeInterface;
use PDOStatement;

interface studentRepository
{
    public function allStudents(): array;
    public function studentBrithAt(DateTimeInterface $dateBrith) : array;
    public function update(Student $student) : bool;
    public function save(Student $student) : bool;
    public function remove(Student $student) : bool;
    public function insere(Student $student) : bool;
    public function hydrateStudentList(PDOStatement $stmt) : array;
}