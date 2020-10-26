<?php

namespace GradeSystem\Database;

class StudentRepository extends Repository implements IRepository
{
    public function findById(int $id) : array
    {
        try
        {
            $sql = "SELECT id, name, grades FROM students WHERE id = :id LIMIT 1;";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $result = $stmt->fetch();

            if($result == NULL) return array();

            return $result;
        } catch (\Exception $exception)
        {
            echo $exception->getMessage();
            return array();
        }
    }
}