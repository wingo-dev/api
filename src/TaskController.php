<?php
class TaskController
{
    public function processRequest(string $method, ? string $id) : void
    {
        if ($id === null) {
            if ($method == "GET") {
                echo json_encode($this->gateway->getAll());
            }
        } elseif ($method == "POST") {
            $data = file_get_contents("php://input");
            echo $data . "test successfully";

        } else {

            switch ($method) {

                case "GET":
                    echo "show$id";
                    break;
                case "PATCH":
                    echo "update$id";
                    break;
                case "DELETE":
                    echo "delete$id";
                    break;
                default:
                    echo "invalid";
                    break;
            }
        }
    }
}