<?php


namespace Models;


class ProjectStatus
{
    public
        /**
         * @var int
         * @SQLType int
         * @SQLAttributes auto_increment not null primary key
         */
        $id,
        /**
         * @var string
         * @SQLType varchar(120)
         */
        $name,
        $description;
}