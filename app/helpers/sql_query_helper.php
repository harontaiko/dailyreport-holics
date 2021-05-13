<?php


/**
 * select all values from the table given in the Query instance
 */
function selectAll($table, $db)
{
  /* mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); */
  $query = "SELECT * FROM " . $table . "";

  //SECURE STMT'S
  $stmt = $db->prepare($query);
  $stmt->execute();

  return $stmt;
}

/**
 * last inserted id
 *
 * obsolete, doesnt work
 */
function LastInsertedId($db)
{
  $query = "SELECT LAST_INSERT_ID()";

  $stmt = $db->prepare($query);
  $stmt->execute();

  return $stmt;
}


/**
 * select count only from given table i.e. total number of values in a table
 *
 * number only!
 */
function selectCount($table, $db)
{
  $query = "SELECT COUNT(*) AS qns FROM " . $table . "";

  //SECURE STMT'S
  $stmt = $db->prepare($query);
  $stmt->execute();

  return $stmt;
}

/**
 * select data in descending order from latest to oldest no max value
 *
 * select all values from the table given in the Query instance
 *
 * without a limit
 */
function SelectAllLatest($ORDER_VALUE, $table, $db)
{
  $query = "SELECT * FROM " . $table . " ORDER BY " . $ORDER_VALUE . " DESC";

  $stmt = $db->prepare($query);
  $stmt->execute();

  return $stmt;
}

/**
 * select data in descending order from latest to oldest WITH LIMIT
 *
 * select all values from the table given in the Query instance
 *
 * with a limit
 */
function SelectAllLatestLimit($ORDER_VALUE_, $limit, $table, $db)
{
  /*         mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); */
  $query =
    "SELECT * FROM " .
    $table .
    " ORDER BY " .
    $ORDER_VALUE_ .
    " DESC LIMIT " .
    $limit .
    "";

  $stmt = $db->prepare($query);
  $stmt->execute();

  return $stmt;
}

/**
 * inserts data into a database without conditions

 * placeholders are in the form ?, ? ... 

 * $fields, $values and $placeholders parameters are all arrays

 * the binders are in the form ('sss..sn') or (iii..in)

 * the number of binders = number of placeholders

 * this function does not support conditions e.g. WHERE.... 

 */
function Insert($fields, $placeholders, $binders, $values, $table, $db)
{

  $field_val = implode(", ", $fields);

  $ph = implode(", ", $placeholders);
 
  $query =
    "INSERT INTO " . $table . " (" . $field_val . ")  VALUES(" . $ph . ")";

  $stmt = $db->prepare($query);

  $stmt->bind_param("" . $binders . "", ...$values);
 
  $stmt->execute();
}

/**
 * update table in the query instance

 * use default sql update query format

 * values are in the form of arrays

 * $values = array($val1, $val2, ....)
 */
function Update($query, $binders, $values, $table, $db)
{
  $stmt = $db->prepare($query);

  $stmt->bind_param("" . $binders . "", ...$values);

  $stmt->execute();
}

/**
 * Delete a row from a table
 *
 * Use default sql DELETE query format
 */
function Delete($query, $binders, $values, $table, $db)
{
  /*  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); */
  $stmt = $db->prepare($query);

  $stmt->bind_param("" . $binders . "", ...$values);

  $stmt->execute();
}

/**
 * SELECT DATA FROM DB WITH CONDITIONS

 * CONDITIONS, WHERE, AND ....e.t.c

 */
function SelectCond($query, $binders, $parameters, $db)
{
  $stmt = $db->prepare($query);

  $stmt->bind_param("" . $binders . "", ...$parameters);

  $stmt->execute();

  return $stmt;
}

/**
 * SELECT DATA FROM DB WITH CONDITIONS

 * NO BINDERS OR PLACEHOLDERS 
     
 * JUST PURE SQL STATEMENTS

 */
function SelectCondFree($query, $table, $db)
{
  $stmt = $db->prepare($query);

  $stmt->execute();

  return $stmt;
}

/**
 * INSERT DATA TO DB WITH CONDITIONS

 * CONDITIONS, WHERE, AND ....e.t.c

 */
function InsertCond($query, $table, $db)
{
  $stmt = $db->prepare($query);

  $stmt->execute();

  return $stmt;
}

/**
 * used to search database for a matching value

 * SELECT * FROM table WHERE $fieldofsearch LIKE $matching value

 * one matching value only

 * use arrays for both parameters
 */
function Search($fieldofSearch, $matchingValue, $table, $db)
{
  $query = "SELECT * FROM " . $table . " WHERE " . $fieldofSearch . " LIKE ?";

  $stmt = $db->prepare($query);

  //only one paramter is passed
  $stmt->bind_param("s", $matchingValue);

  $stmt->execute();

  return $stmt;
}

/**
 * single column efficient fullsearch
 *
 * Efficient but slow
 */
function SingleColumnSearch($matchingVal, $specific_column, $table, $db)
{
  //add full text functionality to column
  $q_f = "ALTER TABLE " . $table . " ADD FULLTEXT (" . $specific_column . ") ";

  $stmt = $db->prepare($q_f);

  $stmt->execute();

  $q =
    "SELECT p.*, MATCH (p." .
    $specific_column .
    ") AGAINST (?) AS score FROM " .
    $table .
    " p WHERE p.question_id <> 23 AND MATCH (p." .
    $specific_column .
    ") AGAINST (?) > 0 LIMIT 4";

  $stmt_s = $db->prepare($q);

  $stmt_s->bind_param("ss", $matchingVal, $matchingVal);

  $stmt_s->execute();

  return $stmt_s;
}

function SingleColumnSearchRelatedQuestion(
  $matchingVal,
  $qId,
  $specific_column,
  $table,
  $db
) {
  //add full text functionality to column
  $q_f = "ALTER TABLE " . $table . " ADD FULLTEXT (" . $specific_column . ") ";

  $stmt = $db->prepare($q_f);

  $stmt->execute();

  $q =
    "SELECT p.*, MATCH (p." .
    $specific_column .
    ") AGAINST (?) AS score FROM " .
    $table .
    " p WHERE p.question_id !=? AND p.question_id <> 23 AND MATCH (p." .
    $specific_column .
    ") AGAINST (?) > 0 LIMIT 4";

  $stmt_s = $db->prepare($q);

  $stmt_s->bind_param("sss", $matchingVal, $qId, $matchingVal);

  $stmt_s->execute();

  return $stmt_s;
}

function SingleColumnSearchQuestionSuggestion(
  $matchingVal,
  $specific_column,
  $table,
  $db
) {
  //add full text functionality to column
  $q_f = "ALTER TABLE " . $table . " ADD FULLTEXT (" . $specific_column . ") ";

  $stmt = $db->prepare($q_f);

  $stmt->execute();

  $q =
    "SELECT p.*, MATCH (p." .
    $specific_column .
    ") AGAINST (?) AS score FROM " .
    $table .
    " p WHERE p.question_id <> 23 AND MATCH (p." .
    $specific_column .
    ") AGAINST (?) > 0 LIMIT 20";

  $stmt_s = $db->prepare($q);

  $stmt_s->bind_param("ss", $matchingVal, $matchingVal);

  $stmt_s->execute();

  return $stmt_s;
}

/**
 * perfoms full text search in database
 *
 * not efficient enough
 *
 *  ADDS FULLTEXT FUNCTIONALITY IN DATABASE
 *
 * currently doesnt work
 *
 *  this function supports natural lang search for one column
 */
function Fullsearch($searchfield, $matchingitem, $table, $db)
{
  //the matching item represents the fields
  $realmatch = $matchingitem;
  //add functionality on one instance
  $q_f = "ALTER TABLE " . $table . " ADD FULLTEXT (" . $realmatch . ") ";
  $stmt = $db->prepare($q_f);

  $stmt->execute();

  //do the actual search
  $q_s =
    "SELECT * FROM " .
    $table .
    " WHERE MATCH " .
    $searchfield .
    " AGAINST(? IN NATURAL LANGUAGE MODE)";
  $stmt_s = $db->prepare($q_s);
  $stmt_s->bind_param("s", $matchingitem);
  $stmt_s->execute();

  return $stmt_s;
}

function CheckAdviceTbl($table, $db)
{
  $query = 'SELECT COUNT(*) FROM '.$table.'';

  $stmt = $db->prepare($query);

  $stmt->execute();

  return $stmt;
}


function verifyThisUserInfo($table, $db, $username)
{
  $query = 'SELECT * FROM '.$table.' WHERE owner_name=?';

  $stmt = $db->prepare($query);

  $stmt->bind_param('s', $username);

  $stmt->execute();

  return $stmt;
}

function checkLimit($username, $table, $currentdate, $db)
{
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $query =  'SELECT COUNT(*) AS `post_count` FROM '.$table.' WHERE date_created = ? AND owner_name=?';

  $stmt = $db->prepare($query);

  $stmt->bind_param('ss',$currentdate, $username);

  $stmt->execute();

  return $stmt;
}

function getAllAlumni($table, $db)
{
  $query = 'SELECT DISTINCT owner_name FROM '.$table.' ORDER BY advice_id ASC';

  $stmt = $db->prepare($query);

  $stmt->execute();

  return $stmt;
}

 function getThisAdvice($table, $category, $db)
{
  $query = 'SELECT * FROM '.$table.' WHERE advice_category=? ORDER BY advice_id ASC';

  $stmt = $db->prepare($query);

  $stmt->bind_param('s', $category);

  $stmt->execute();

  return $stmt;
}

function LoadUsers($usertable, $db){
  // check user and question data
  $users = "SELECT * FROM " . $usertable . "";

  $stmtusers = $db->prepare($users);

  $stmtusers->execute();

  $resultuser = $stmtusers->get_result();

  if (!($resultuser->num_rows >= 3)){
    $userFields = [
      "username",
      "email",
      "password",
      "is_admin",
      "date_created",
      "time_created",
      "created_by",
      "creator_ip",
    ];
    $userPlaceholders = ["?", "?", "?", "?", '?', '?', '?', '?'];
    $userBinders = "ssssssss";
    
    date_default_timezone_get();
    
    $dateLoggeedIn = date('Y-m-d', time());
          
    $timeLoggeedIn = date('H:i:s T', time());

    $ip = get_ip_address();

    $userValues = [
      "sammy",
      "samuelmbugua479@gmail.com",
      '$2y$10$Ak88YV9kdnr4wL1/MzxQuuj49GRfC.nzXnSq30yxQDNs3.8RCOohi',
      "true",
      $dateLoggeedIn,
      $timeLoggeedIn,
      'sammy',
      $ip,
    ];

    /////////////////////////////////////////////
    $userFields2 = [
      "username",
      "email",
      "password",
      "is_admin",
      "date_created",
      "time_created",
      "created_by",
      "creator_ip",
    ];
    $userPlaceholders2 = ["?", "?", "?", "?", '?', '?', '?', '?'];
    $userBinders2 = "ssssssss";
    $userValues2 = [
      "jeff",
      "jeffniu90@gmail.com",
      '$2y$10$vg3c6Lzt33u6AKlVvr787euiSBppZ3QfpOQHFg4mhFLJoYfDAeolm',
      "true",
      $dateLoggeedIn,
      $timeLoggeedIn,
      'jeff',
      $ip,
    ];

    /////////////////////////////////////////////
    $userFields3 = [
      "username",
      "email",
      "password",
      "is_admin",
      "date_created",
      "time_created",
      "created_by",
      "creator_ip",
    ];
    $userPlaceholders3 = ["?", "?", "?", "?", '?', '?', '?', '?'];
    $userBinders3 = "ssssssss";
    $userValues3 = [
      "haron",
      "harontaiko@gmail.com",
      '$2y$10$YM5yEMw/eA9eeDfO/5hFZuYsvNOe.F..VUvBCXrUJrxqxkQhSPxGC',
      "true",
      $dateLoggeedIn,
      $timeLoggeedIn,
      'haron',
      $ip,
    ];

    try {
      Insert(
        $userFields,
        $userPlaceholders,
        $userBinders,
        $userValues,
        $usertable,
        $db
      );
      Insert(
        $userFields2,
        $userPlaceholders2,
        $userBinders2,
        $userValues2,
        $usertable,
        $db
      );
      Insert(
        $userFields3,
        $userPlaceholders3,
        $userBinders3,
        $userValues3,
        $usertable,
        $db
      );

    } catch (Error $e) {
      return false;
    }
  }
  else{

  }
}

//verify mail and token
function verifyTokenAndmail($table, $email, $db)
{
  $query = "SELECT * FROM " . $table . " WHERE email=?";

  $stmt = $db->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();

  return $stmt;
}


/**
 * reset token
 */
function ResetToken($table, $id, $newTokenVal, $db)
{
  $query = "UPDATE " . $table . " SET reset_link=? WHERE user_id=?";

  $stmt = $db->prepare($query);
  $stmt->bind_param("ss", $newTokenVal, $id);
  $stmt->execute();

  return $stmt;
}

function getItemSoldCountInventory($name, $db)
{
  $query = 'SELECT COUNT(*) AS cnt FROM dr_sales WHERE sales_item = ?';

  $binders = "s";

  $parameters = array($name);

  $result = SelectCond($query, $binders, $parameters, $db);

  $row = $result->get_result();

  $rowItem = $row->fetch_assoc();
  
  $count = $rowItem['cnt'];

  try {
      return $count;
  } catch (Error $e) {
      return false;
  }
}