<?php

class TrashClass{
    public function __construct(private $trashInformation) {

    }
    public function getTrashInformation() {
        return $this->trashInformation;
    }
}

$trash = new TrashClass("This is a trash object.");

echo $trash->getTrashInformation();