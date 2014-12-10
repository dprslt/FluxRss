<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 07/12/2014
 * Time: 18:21
 */

abstract class  Persistance {
    public abstract function saveFlux($id, $path, $link);
} 