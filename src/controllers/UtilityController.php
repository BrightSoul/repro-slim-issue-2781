<?php
namespace Example\Controllers
{
    class UtilityController
    {
      public function getServerTime($request, $response, $args) {
        $now = new \DateTime();
        $dto = array('now' => $now->getTimestamp());
        return $response->withJson($dto);
      }
    }
}