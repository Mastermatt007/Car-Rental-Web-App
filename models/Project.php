<?php


namespace Models {


    class Project
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
             * @SQLType varchar(200)
             */
            $name,
            /**
             * @var @SQLType int
             * @SQLAttributes references users(id)
             */
            $statusId,
            /**
             * @var string
             * @SQLAttributes references users(id)
             */
            $customerId,
            /**
             * @var string
             * @SQLAttributes references users(id)
             */
            $architectId,
            $description,
            /**
             * @var
             * @SQLType date
             */
            $startDate,
            /**
             * @var
             * @SQLType date
             */
            $endDate;
    }
}