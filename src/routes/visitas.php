<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/api/visitas', function(Request $request, Response $response) {

    $listVisitas = [];
    $sql = "SELECT * FROM visita"; 
    try {
        include("../src/entities/Visita.php");
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $object = new Visita();
                $object->id = (int)$row['id'];
                $object->lugar = $row['lugar'];
                $object->motivo = $row['motivo'];
                $object->responsable = $row['responsable'];
                $object->latitud = $row['latitud'];
                $object->longitud = $row['longitud'];
                $listVisitas[] = $object;
            }
        }

        $db = null;
        return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($listVisitas), JSON_UNESCAPED_UNICODE);
    } catch(Exception $ex){
        echo '{"error": {"text": '.$ex->getMessage().'}';
    }
});

?>