<?php

class AddTwoNumber
{
    public function addTwoNumbers($l1, $l2)
    {
        // 补齐
        $l1l = count($l1);
        $l2l = count($l2);
        if ($l1l > $l2l) {
            $l2 = array_pad($l2, $l1l, 0);
        } else {
            $l1 = array_pad($l1, $l2l, 0);
        }

        $result = [];
        foreach ($l1 as $k => &$v) {
            $l2v = array_shift($l2);
            $sum = $v + $l2v;
            if ($sum >= 10) {
                $flag = 1;
                $result[] = $sum - 10;
            } else {
                $flag = 0;
                $result[] = $sum;
            }
            if ($flag) {
                if (isset($l1[$k+1])) {
                    $l1[$k+1] += 1;
                } elseif (isset($l2[0])) {
                    $l2[0] += 1;
                }
            }
            if (!$l2) {
                break;
            }
        }
        if ($flag) {
            array_push($result, 1);
        }

        return $result;
    }
}

$l1 = [2, 4, 3];
$l2 = [5, 6, 7];
$c = new AddTwoNumber();
$res = $c->addTwoNumbers($l1, $l2);
print_r($res);
