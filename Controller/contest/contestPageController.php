<?php
include '../../Model/databaseConnection/contestDatabase.php';

function returnContests($userId) {
    $futureContests = getFutureAndCurrentContests();
    $previousContests = getPreviousContests();
    $currentContests = getCurrentlyRunningContests();

    // Check if the user is registered for each future contest
    foreach ($futureContests as &$contest) {
        $contest['is_registered'] = isUserRegistered($userId, $contest['id']);
    }

    return [
        'future' => $futureContests,
        'previous' => $previousContests,
        'current' => $currentContests
    ];
}
?>