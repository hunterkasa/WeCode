<?php
include 'dbcon.php';

    function getFutureAndCurrentContests()    {
        $conn = getConnection();
        $sql = "SELECT contests.id, contests.contest_name, contests.start_date, contests.duration,
                    COUNT(DISTINCT problems.id) as problems, 
                    COUNT(DISTINCT registrations.id) as participants,
                    TIMESTAMPDIFF(SECOND, NOW(), DATE_ADD(contests.start_date, INTERVAL contests.duration MINUTE)) as time_left
                FROM contests 
                LEFT JOIN problems ON contests.id = problems.contest_id 
                LEFT JOIN registrations ON contests.id = registrations.contest_id 
                WHERE contests.start_date >= NOW() 
                GROUP BY contests.id";
        $result = $conn->query($sql);
        $contests = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contests[] = $row;
            }
        }
        $conn->close();
        return $contests;
    }

    function getPreviousContests()    {
        $conn = getConnection();
        $sql = "SELECT contests.id, contests.contest_name, contests.start_date, contests.duration,
                    COUNT(DISTINCT problems.id) as problems, 
                    COUNT(DISTINCT registrations.id) as participants
                FROM contests 
                LEFT JOIN problems ON contests.id = problems.contest_id 
                LEFT JOIN registrations ON contests.id = registrations.contest_id 
                WHERE contests.start_date < NOW() AND DATE_ADD(contests.start_date, INTERVAL contests.duration MINUTE) < NOW()
                GROUP BY contests.id";
        $result = $conn->query($sql);
        $contests = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contests[] = $row;
            }
        }
        $conn->close();
        return $contests;
    }

    function getCurrentlyRunningContests()    {
        $conn = getConnection();
        $sql = "SELECT contests.id, contests.contest_name, contests.start_date, contests.duration,
                    COUNT(DISTINCT problems.id) as problems, 
                    COUNT(DISTINCT registrations.id) as participants,
                    TIMESTAMPDIFF(SECOND, NOW(), DATE_ADD(contests.start_date, INTERVAL contests.duration MINUTE)) as time_left
                FROM contests 
                LEFT JOIN problems ON contests.id = problems.contest_id 
                LEFT JOIN registrations ON contests.id = registrations.contest_id 
                WHERE contests.start_date <= NOW() AND DATE_ADD(contests.start_date, INTERVAL contests.duration MINUTE) >= NOW()
                GROUP BY contests.id";
        $result = $conn->query($sql);
        $contests = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contests[] = $row;
            }
        }
        $conn->close();
        return $contests;
    }

    function isUserRegistered($userId, $contestId)    {
        $conn = getConnection();
        $sql = "SELECT * FROM registrations WHERE user_id = ? AND contest_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $contestId);
        $stmt->execute();
        $result = $stmt->get_result();
        $isRegistered = $result->num_rows > 0;
        $stmt->close();
        $conn->close();
        return $isRegistered;
    }

?>