<?php

namespace common\utils;


use stdClass;

class ArrayHelper extends \yii\helpers\ArrayHelper
{
    public static function mergeArray($a, $b)
    {
        foreach ($b as $k => $v) {
            if (is_integer($k)) {
                $a[] = $v;
            } elseif (is_array($v) && isset($a[$k]) && is_array($a[$k])) {
                $a[$k] = self::mergeArray($a[$k], $v);
            } else {
                $a[$k] = $v;
            }
        }
        return $a;
    }

    /**
     * 支持对数组按某个key或属性进行分组
     * @param array $arr
     * @param callable|string $key_selector
     * @return array
     */
    public static function group(array $arr, $key_selector)
    {
        if (!isset($arr))
            return null;

        $isSelector = is_callable($key_selector);
        $result = array();
        foreach ($arr as $i) {
            if ($isSelector) {
                $key = call_user_func($key_selector, $i);
                if ($key) {
                    $result[$key][] = $i;
                }
            } else {
                $key = $i[$key_selector];
                $result[$key][] = $i;
            }
        }
        return $result;
    }

    public static function select(array $arr, callable $selector)
    {
        if (!isset($arr))
            return null;

        $result = array();
        foreach ($arr as $item) {
            $d = call_user_func($selector, $item);
            if (isset($d)) {
                $result[] = $d;
            }
        }
        return $result;
    }

    /**
     * 过滤数组
     * eg:
     * $dict: ['id'=>1, 'name' => 'car', 'price' => 111.00]
     * $allow: ['name', 'type', 'id']
     * return=> ['name'=>'car', 'id'=>1]
     * @param array $dict 输入
     * @param array $allow 有效的字段,为空则直接返回$dict
     * @return array
     */
    public static function filterDict($dict, $allow = [])
    {
        if (empty($dict)) {
            return [];
        }

        if (empty($allow)) {
            return $dict;
        }

        return array_intersect_key($dict, array_flip($allow));
    }

    /**
     * 造成查询条件, 字段值为空字符，则不会在查询结果出现
     * eg:
     * $dict: ['id'=>1, 'name' => '', 'price' => 111.00]
     * $allow: ['name', 'type', 'id']
     * return=> ['id'=>1]
     * @param array $post 输入
     * @param array $allow 有效的字段,为空则直接返回$dict
     * @return array
     */
    public static function toCondition($post, $allow = [])
    {
        if (empty($post)) {
            return [];
        }

        foreach ($post as $k => $v) {
            if ($v == '') {
                unset($post[$k]);
            }
        }

        if (empty($allow)) {
            return $post;
        }

        return array_intersect_key($post, array_flip($allow));
    }

    /**
     * 将数组转化成字典
     * @param array $arr
     * @param string $key
     * @return array
     */
    public static function toDict($arr, $key)
    {
        if (empty($arr)) {
            return [];
        }
        if (empty($key)) {
            throw new \InvalidArgumentException('$key');
        }
        $dict = [];
        foreach ($arr as $item) {
            $dict[$item[$key]] = $item;
        }
        return $dict;
    }

    /**
     * 对象转换为数组
     * @param $object
     * @return array
     */
    public static function object2array($object)
    {
        $array = [];
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }

    /**
     * 数组转换为对象
     * @param $array
     * @return stdClass
     */
    public static function array2object($array)
    {
        if (is_array($array)) {
            $obj = new StdClass();
            foreach ($array as $key => $val) {
                $obj->$key = $val;
            }
        } else {
            $obj = $array;
        }
        return $obj;
    }

    /**
     * 根据数组key获取数组value
     * @param array $data
     * @param $key
     * @param string $defaultValue
     * @return string
     */
    public static function getArrayValueByKey(array $data, $key, $defaultValue = '')
    {
        return isset($data[$key]) ? $data[$key] : $defaultValue;
    }


    /**
     * 对象转数组
     * @param $array
     * @return array
     */
    public static function objectToArray($array)
    {
        if (is_object($array)) {
            $array = (array)$array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = self::objectToarray($value);
            }
        }
        return $array;
    }

    public static function convertObjectToArray($stdClassObject)
    {
        return json_decode(json_encode($stdClassObject), true);

        /*  $_array = is_object($stdClassObject) ? get_object_vars($stdClassObject) : $stdClassObject;
          if (!empty($_array)) {
              foreach ($_array as $key => $value) {
                  $value = (is_array($value) || is_object($value)) ? self::convertObjectToArray($value) : $value;
                  $array[$key] = $value;
              }
          }

          return empty($array) ? [] : $array;*/
    }

    public static function convertArrayToObject($arrayData)
    {
        if (is_array($arrayData)) {
            return json_decode(json_encode($arrayData));
        } else {
            return (object)$arrayData;
        }
    }

    /**
     * @param $array
     * @param array $condition
     * @return array
     */
    public static function filterWhere($array, $condition = [])
    {
        if (!isset($array))
            return [];
        return array_filter($array, function ($item) use ($condition) {
            $re = true;
            foreach ($condition as $key => $value) {
                if (is_array($value)) {
                    if (!isset($item[$key]) || !in_array($item[$key], $value)) {
                        $re = false;
                        break;
                    }
                } else {
                    if (!isset($item[$key]) || $item[$key] != $value) {
                        $re = false;
                        break;
                    }
                }
            }
            return $re;
        });
    }

    /**
     * 数据中的NULL数据转为空字符串
     * @param $array
     * @return mixed
     */
    public static function replaceNullToEmpty($array)
    {
        if (!empty($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $array[$key] = self::replaceNullToEmpty($value);
                }
                if (is_null($value)) {
                    $array[$key] = '';
                }
            }
        }
        return $array;
    }

    /**
     * ArrayHelper::index()方法扩展(不移除相同KEY值的数据)
     * @param $array
     * @param $key
     * @return array
     */
    public static function customArrayIndex($array, $key)
    {
        $result = [];
        foreach ($array as $element) {
            $value = ArrayHelper::getValue($element, $key);
            if (isset($result[$value])) {
                $result[$value] = array_merge($result[$value], [$element]);
            } else {
                $result[$value] = [$element];
            }
        }
        return $result;
    }
}