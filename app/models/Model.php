<?php

namespace App\Models;

use App\Models\Connection;

class Model
{
    protected $attributes = [];

    private function __construct()
    {
    }

    public function getAttribute($field)
    {
        return $this->attributes[$field];
    }

    public function setAttribute($field, $value)
    {
        $this->attributes[$field] = $value;
    }

    public function save()
    {
        $class_name = substr(strstr(strtolower(get_called_class()), "app\\models\\"), strlen("app\\models\\"));
        $conn = Connection::getConn();
        $type_insert = false;
        $id = null;

        if ($this->attributes["id"] == null) {
            $columns = [];

            foreach ($this->attributes as $key => $value) {
                if ($value == null)
                    array_push($columns, "null");
                else
                    array_push($columns, "\"$value\"");
            }

            $sql = "INSERT INTO " . $class_name . "s ("
                . implode(",", array_keys($this->attributes)) .
                ") VALUES ("
                . implode(",", $columns) . ")";

            $type_insert = true;
        } else {

            $id = $this->attributes['id'];
            $columns = [];

            foreach ($this->attributes as $key => $value) {
                if ($key != 'id') {
                    if ($value == null)
                        array_push($columns, "$key=null");
                    else
                        array_push($columns, "$key=\"$value\"");
                }
            }

            $sql = "UPDATE " . $class_name . "s SET " . implode(", ", $columns) . ' WHERE id = ' . $id . ';';
        }

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($type_insert)
                $id = $conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Ensuring connection closure
            $conn = null;
            $stmt = null;
        }

        $this->attributes['id'] = $id;

        return $id;
    }

    public function find($id)
    {
        // Here it get the class called name and remove the path to it
        $class_name = substr(strstr(strtolower(get_called_class()), "app\\models\\"), strlen("app\\models\\"));
        $sql = "SELECT " . implode(",", array_keys($this->attributes)) . " FROM " . $class_name . "s WHERE id = $id;";

        $conn = Connection::getConn();

        try {

            $stmt = $conn->prepare($sql);
            $result = null;

            if ($stmt->execute()) {
                foreach ($stmt->fetch(\PDO::FETCH_ASSOC) as $key => $value) {
                    $this->attributes[$key] = $value;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Ensuring connection closure
            $conn = null;
            $stmt = null;
        }
    }
}
