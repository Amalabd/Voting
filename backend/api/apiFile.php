<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// to allow CORS requests from the frontend
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once __DIR__ . '/db.php';

$method = $_SERVER['REQUEST_METHOD']; // to check the request art post or get
$action = $_GET['action'] ?? '';

$pdo = get_db(); // the connection to the database

switch ("$method:$action") {

  case 'POST:login':
    login($pdo);
    break;

  case 'GET:getCandidates':
    getCandidates($pdo);
    break;

    case 'POST:submitVotes':
    submitVotes($pdo);
    break;


  default:
    echo json_encode(['error' => 'Invalid request']);
    break;
}

// to get all voters for login
function login($pdo) {
  // Get JSON data sent from frontend
  $input = json_decode(file_get_contents("php://input"), true);
  $email = $input['email'] ?? '';
  $password = $input['password'] ?? '';

  try {
    $stmt = $pdo->prepare("SELECT id, email, password, name, voted FROM voters WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $password) { // plain-text check, later i might use password_hash
      echo json_encode([
        'success' => true,
        'user' => $user
      ]);
    } else {
      echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'DB error', 'message' => $e->getMessage()]);
  }
}


// to get all candidates
function getCandidates($pdo) {
  try {
    $stmt = $pdo->query("SELECT id, name, votes FROM candidates");
    $data = $stmt->fetchAll();
    echo json_encode($data);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'DB error', 'message' => $e->getMessage()]);
  }
}
//#############################################################
function submitVotes(PDO $pdo) {
  $input = json_decode(file_get_contents("php://input"), true);
  $votes = $input['votes'] ?? null;
  $voterId = $input['userId'] ?? null;

  if (!$votes || !$voterId) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing votes']);
    return;
  }

  $voteMap = [];

  // : [{candidateId: 1, votes: 3}, ...]
  if (is_array($votes) && isset($votes[0]) && is_array($votes[0]) && array_key_exists('id', $votes[0])) {
    foreach ($votes as $v) {
      $cid = (int)($v['id'] ?? 0);
      $cnt = (int)($v['votes'] ?? 0);
      if ($cid > 0 && $cnt > 0) {
        $voteMap[$cid] = ($voteMap[$cid] ?? 0) + $cnt;
      }
    }
  }
  // { "1": 3, "4": 1 }
  elseif (is_array($votes)) {
    foreach ($votes as $cid => $cnt) {
      $cid = (int)$cid;
      $cnt = (int)$cnt;
      if ($cid > 0 && $cnt > 0) {
        $voteMap[$cid] = ($voteMap[$cid] ?? 0) + $cnt;
      }
    }
  }

  if (empty($voteMap)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid votes format']);
    return;
  }

  $total = array_sum($voteMap);
  if ($total > 4) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'You can submit up to 4 votes total']);
    return;
  }

  try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("UPDATE candidates SET votes = votes + :v WHERE id = :id");

    $voterId = $input['userId'] ?? null;
    $stmtVoter = $pdo->prepare("UPDATE voters SET voted = 1 WHERE id = ?");
    $stmtVoter->execute([$voterId]);


    foreach ($voteMap as $id => $count) {
      $stmt->execute([
        ':v'  => $count,
        ':id' => $id
      ]);
      
    }

    $pdo->commit();
    echo json_encode(['success' => true]);

  } catch (Exception $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'DB error', 'detail' => $e->getMessage()]);
  }
}


