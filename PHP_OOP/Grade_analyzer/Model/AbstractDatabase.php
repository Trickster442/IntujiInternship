<?php
namespace Grade_analyzer\Model;

abstract class AbstractDatabase
{
    abstract function createDatabase():string;
}