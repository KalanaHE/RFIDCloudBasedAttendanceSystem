<?php

// DB table to use
$table = 'user_attendance';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
array( 'db' => 'id', 'dt' => 0 ),	
array( 'db' => 'userid', 'dt' => 1 ),
array( 'db' => 'allow', 'dt' => 2 ),
array( 'db' => 'timestamp', 'dt' => 3 )
);

// SQL server connection information
$sql_details = array(
'user' => 'root',
'pass' => 'Tangojuliet1996',
'db' => 'attendanceSysDB',
'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* If you just want to use the basic configuration for DataTables with PHP
* server-side, there is no need to edit below this line.
*/

require( 'vendor/datatables/ssp.class.php' );

echo json_encode(
SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

