<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'src/Segment.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
$container = $app->getContainer();//Set up dependency injectino

//Set up a database connection
$container['db'] = function ($c) {
    $db = array('host' => 'localhost', 'dbname' => 'segment', 'user' => 'root', 'pass' => 'root');
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

//Endpoind for accepting events and sending them to mysql
$app->post('/event/new', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $segment = new Segment\Segment;
    $newEvent = $segment->new($data);

    if ($newEvent !== false) {
        $sql = "INSERT INTO geofence (roaming_request_id, run_id, shift_id, event_type, event_timestamp) VALUES (?, ?, ?, ?, STR_TO_DATE(?,'%Y-%m-%dT%TZ'))";
        $sth = $this->db->prepare($sql);
        $sth->execute([$newEvent['roaming_request_id'], $newEvent['run_id'], $newEvent['shift_id'], $newEvent['event_type'], $newEvent['event_timestamp']]);
        $eventId = $this->db->lastInsertId();
        return $this->response->withJson($eventId);
    } else {
        return $this->response->withStatus(400);
    }
});
$app->run();
