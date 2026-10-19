<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績判定システム</title>
</head>
<body>
    <h1>成績判定システム</h1>

    <?php
    // 学生データの定義
    $students = [
        ["name" => "田中太郎", "score" => 85],
        ["name" => "佐藤花子", "score" => 92],
        ["name" => "鈴木一郎", "score" => 78],
        ["name" => "高橋美咲", "score" => 65],
        ["name" => "伊藤健太", "score" => 58],
    ];
    ?>

    <h2>【個別成績】</h2>
    
    <?php
    // 評価判定関数    
    function evaluateScore($score) {
        if ($score >= 90) {
            $grade = "A";
            $status = "優秀";
        } elseif ($score >= 80) {
            $grade = "B";
            $status = "良好";
        } elseif ($score >= 70) {
            $grade = "C";
            $status = "普通";
        } elseif ($score >= 60) {
            $grade = "D";
            $status = "要努力";
        } else {
            $grade = "F";
            $status = "不合格";
        }

        return ["grade" => $grade, "status" => $status];
    }

    // 評価判定と表示
    foreach ($students as $student) {
        $result = evaluateScore($student["score"]);
        echo $student["name"] . ": " . $student["score"] . "点" . " - 評価" . $result["grade"] . "<br>";
    }
    ?>

    <h2>【統計情報】</h2>

    <?php
    // 統計処理
    $pass_count = 0;
    $fail_count = 0;

    foreach ($students as $student) {
        if ($student["score"] >= 60) {
            $pass_count++;
        } else {
            $fail_count++;
        }
    }
    
    echo "合格者数: " . $pass_count . "人<br>";
    echo "不合格者数: " . $fail_count . "人<br>";

    $total_score = 0;

    foreach ($students as $student) {
        $total_score += $student["score"];
    }
    $average = $total_score / count($students);

    echo "平均点: " . number_format($average,1) . "点";
    ?>

</body>
</html>