<?php


namespace Models;


class ProjectImage
{
    public
        /**
         * @var int
         * @SQLType int
         * @SQLAttributes auto_increment not null primary key
         */
        $id,
        /**
         * @var
         * @SQLAttributes references project(id)
         */
        $projectId,
        $description,
        /**
         * @var
         * @file
         */
        $image;
}