<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'news_details';
 
// Table's primary key
$primaryKey = 'news_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names

$columns = array(
    array( 'db' => 'news_id'             ,     'dt' => 'news_id' ),
    array( 'db' => 'isin'                ,     'dt' => 'isin' ),
    array( 'db' => 'isin_multiple'       ,     'dt' => 'isin_multiple' ),
    array( 'db' => 'news_source_id'      ,     'dt' => 'news_source_id' ),
    array( 'db' => 'news_category_id'    ,     'dt' => 'news_category_id' ),
    array( 'db' => 'file_individual'     ,     'dt' => 'file_individual' ),
    array( 'db' => 'file_group'          ,     'dt' => 'file_group' ),
    array( 'db' => 'news_title'          ,     'dt' => 'news_title' ),
    array( 'db' => 'news_message'        ,     'dt' => 'news_message' ),
    array( 'db' => 'news_keyword'        ,     'dt' => 'news_keyword' ),
    array( 'db' => 'news_description'    ,     'dt' => 'news_description' ),
    array( 'db' => 'news_status'         ,     'dt' => 'news_status' ),
    array( 'db' => 'news_details_status' ,     'dt' => 'news_details_status' )
);

// SQL server connection information

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'equitybulls',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );

echo json_encode( SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns ));