<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


// get all users
 $app->get('/users', function ($request, $response, $args) {
 $sth = $this->db->prepare("SELECT * FROM users ORDER BY id");
 $sth->execute();
 $todos = $sth->fetchAll();
     return $this->response->withJson($users);
 });


// Retrieve user with id 
 $app->get('/user_name/[{id}]', function ($request, $response, $args) {
 $sth = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        $sth->bindParam("id", $args['id']);
 $sth->execute();
 $todos = $sth->fetchObject();
     return $this->response->withJson($users);
 });


 // Search for todo with given search teram in their name
 $app->get('/users/search/[{query}]', function ($request, $response, $args) {
 $sth = $this->db->prepare("SELECT * FROM users WHERE UPPER(user_name) LIKE :query ORDER BY id");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
 $sth->execute();
 $users = $sth->fetchAll();
     return $this->response->withJson($users);
 });

// Add a user
 $app->post('/user', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO users (user_name) VALUES (:user_name)";
 $sth = $this->db->prepare($sql);
        $sth->bindParam("user_name", $input['user_name']);
 $sth->execute();
 $input['id'] = $this->db->lastInsertId();
     return $this->response->withJson($input);
 });

// DELETE a user with given id
 $app->delete('/user/[{id}]', function ($request, $response, $args) {
 $sth = $this->db->prepare("DELETE FROM users WHERE id=:id");
        $sth->bindParam("id", $args['id']);
 $sth->execute();
 $users = $sth->fetchAll();
     return $this->response->withJson($users);
 });


// Update todo with given id
 $app->put('/user/[{id}]', function ($request, $response, $args) {
        $input = $request->getParsedBody();
        $sql = "UPDATE tasks SET user_name=:uer_name WHERE id=:id";
 $sth = $this->db->prepare($sql);
        $sth->bindParam("id", $args['id']);
        $sth->bindParam("user_nam", $input['user_nam']);
 $sth->execute();
        $input['id'] = $args['id'];
     return $this->response->withJson($input);
 });
