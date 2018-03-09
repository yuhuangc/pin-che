<?php

namespace common\utils;

use DateTime;
use Exception;

class DateTimeHelper
{
    public static function short($time, $split = '/')
    {
        if (!$time) {
            return '';
        }
        return date("Y" . $split . "m" . $split . "d", strtotime($time));
    }

    /**
     * 当前系统时间，精确到秒
     * @param string $timezone 时区
     * @return bool|string
     */
    public static function now($timezone = 'PRC')
    {
        date_default_timezone_set($timezone);

        return date('Y-m-d H:i:s', time());
    }

    /**
     * 返回北京时间的timestamp
     * @return int
     */
    public static function time()
    {
        date_default_timezone_set("PRC");
        return time();
    }

    /**
     * 当前系统时间
     * @param string $timezone
     * @return string
     */
    public static function nowMicro($timezone = 'PRC')
    {
        date_default_timezone_set($timezone);
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
        $d = new \DateTime(date('Y-m-d H:i:s.' . $micro, $t));
        return $d->format("Y-m-d H:i:s.u");
    }

    /*
    * 时间戳转日期
    */
    public static function timestamp2datetime($stamp, $timezone = 'PRC')
    {
        date_default_timezone_set($timezone);

        return date('Y-m-d H:i:s', $stamp);
    }

    public static function format($time = '', $format = "Y-m-d H:i:s")
    {
        if (!$time) {
            $time = self::now();
        }
        if (!$format) {
            $format = "Y-m-d H:i:s";
        }
        return date($format, strtotime($time));
    }

    /**
     * @param $timestamp1
     * @param string $timestamp2
     * @return string
     */
    public static function diffTimestamp($timestamp1, $timestamp2 = '')
    {
        if (empty($timestamp2)) {
            $timestamp2 = time();
        }

        $startTime = min([$timestamp1, $timestamp2]);
        $endTime = max([$timestamp1, $timestamp2]);

        $timeDiff = $endTime - $startTime;
        $timeDiff_d = floor($timeDiff / 86400);

        $timeDiff -= $timeDiff_d * 86400;
        $timeDiff_h = floor($timeDiff / 3600);

        $timeDiff -= $timeDiff_h * 3600;
        $timeDiff_m = floor($timeDiff / 60);

        return $timeDiff_d . '天' . $timeDiff_h . '小时' . $timeDiff_m . '分';
    }

    /**
     * 生日算年龄
     * @param string $birthday
     * @return bool|null|string
     */
    public static function convertAge($birthday)
    {
        if (empty($birthday)) {
            return null;
        }
        $age = date('Y', time()) - date('Y', strtotime($birthday)) - 1;
        if (date('m', time()) == date('m', strtotime($birthday))) {
            if (date('d', time()) >= date('d', strtotime($birthday))) {
                $age++;
            }
        } elseif (date('m', time()) > date('m', strtotime($birthday))) {
            $age++;
        }
        return $age;
    }


    /**
     * @param int|string $timeFrom Unix timestamp
     * @return string
     */
    public static function toTimeSince($timeFrom)
    {
        date_default_timezone_set('PRC');
        if (is_string($timeFrom)) {
            $timeFrom = strtotime($timeFrom);
        }
        $now = time();
        $time = $now - $timeFrom;
        $time = ($time < 1) ? 1 : $time;
        $tokens = [
            31536000 => '年',
            2592000 => '月',
            604800 => '周',
            86400 => '天',
            3600 => '小时',
            60 => '分钟',
            1 => '秒'
        ];

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) {
                continue;
            }
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . $text;
        }
        return '-';
    }

    /**
     * @param $date DateTime|string
     * @return string
     */
    public static function ConvertToString($date, $format = 'Y-m-d H:i:s')
    {
        $returnStr = "";
        try {
            if (!empty($date)) {
                if (is_string($date)) {
                    $dateTime = new DateTime($date);
                    $returnStr = date_format($dateTime, $format);
                } else {
                    $returnStr = date_format($date, $format);
                }
            }
        } catch (Exception $ex) {

        }
        return $returnStr;
    }

    public static function ConvertMongoDateToString($date, $format = 'Y-m-d H:i:s')
    {
        if ($date instanceof \MongoDate) {
            return date($format, $date->sec);
        } else {
            return static::ConvertToString($date, $format);
        }
    }

    public static function ConvertToDateTime($dateStr)
    {
        $date = new DateTime($dateStr);
        return $date;
    }

    public static function  ConvertToMongoDate($dataStr)
    {
        return new \MongoDate(strtotime($dataStr));
    }


    /**
     * 转换成标准时区
     * @param $time
     * @return string
     */
    public static function convertToGMT($time)
    {
        return gmdate("Y-m-d\TH:i:s\Z", $time);
    }


    /**
     * @return string
     */
    public static function date()
    {
        date_default_timezone_set("PRC");
        return date('Y-m-d');
    }

    public static function formatDate($time)
    {
        date_default_timezone_set("PRC");
        if (is_string($time)) {
            $time = strtotime($time);
        }
        //获取今天凌晨的时间戳
        $day = strtotime(date('Y-m-d', time()));
        //获取昨天凌晨的时间戳
        $pday = strtotime(date('Y-m-d', strtotime('-1 day')));
        //获取现在的时间戳
        $nowtime = time();
        $tc = $nowtime - $time;
        if ($time < $pday) {
            if ($time > strtotime(date('Y-m-d', strtotime('-3 day')))) {
                $str = "三天内";
            } else if ($time > strtotime(date('Y-m-d', strtotime('-7 day')))) {
                $str = "一周内";
            } else if ($time > strtotime(date('Y-m-d', strtotime('-30 day')))) {
                $str = '一个月内';
            } else {
                $str = '一个月前';//date('Y-m-d', $time);
            }
        } elseif ($time < $day && $time > $pday) {
            $str = "昨天";
        } elseif ($tc > 60 * 60) {
            $str = floor($tc / (60 * 60)) . "小时前";
        } elseif ($tc > 60) {
            $str = floor($tc / 60) . "分钟前";
        } else {
            $str = "一分钟内";
        }
        return $str;
    }

    /**
     * 判断时间显示今天，昨天, 一个星期的星期几
     * @param $last_time 传格式化的时间,如:2017/1/27
     */
    public static function getNowDay($last_time)
    {
        $xs_time = date('H:i', strtotime($last_time));

        $last_time = self::ConvertToString($last_time,'Y/m/d');

        $now_time = date('Y/m/d', time());

        $pre_time = date('Y/m/d', strtotime("-1 days"));

        $week_time = round((time() - strtotime($last_time)) / 3600 / 24);

        $weekarr = array("日", "一", "二", "三", "四", "五", "六");

        if ($last_time == $now_time) {
            return "今天 ".$xs_time;
        } elseif ($last_time == $pre_time) {
            return "昨天 ".$xs_time;
        } elseif ($week_time >= 2 && $week_time <= 6) {
            return '星期' . $weekarr[date('w', strtotime($last_time))]." ".$xs_time;
        } else {
            return date('Y年m月d日', strtotime($last_time))." ".$xs_time;
        }
    }

    /**
     * 判断时间显示今天，昨天, 一个星期的星期几
     * @param $last_time 传格式化的时间,如:2017/1/27
     */
    public static function getRuleDay($last_time)
    {
        $last_time = self::ConvertToString($last_time,'Y/m/d');

        $now_time = date('Y/m/d', time());

        $pre_time = date('Y/m/d', strtotime("-1 days"));

        $week_time = round((time() - strtotime($last_time)) / 3600 / 24);

        $weekarr = array("日", "一", "二", "三", "四", "五", "六");

        if ($last_time == $now_time) {
            return "今天";
        } elseif ($last_time == $pre_time) {
            return "昨天";
        } elseif ($week_time >= 2 && $week_time <= 6) {
            return '星期' . $weekarr[date('w', strtotime($last_time))];
        } else {
            return date('Y/m/d', strtotime($last_time));
        }
    }
}
