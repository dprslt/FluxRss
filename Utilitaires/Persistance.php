<?php

/**
 * Class Persistance
 * @author Charlotte DELAIN, Théo DEPRESLE
 */

abstract class  Persistance {
    public abstract function saveFlux($id, $path, $link);
} 