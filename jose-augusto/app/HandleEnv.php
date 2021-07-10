<?php

namespace JoseAugusto\App;

class HandleEnv
{
    /**
     * @param array $values
     *
     * @return boolean
     */
    public static function change($values = [], $fileDir)
    {

        if (count($values) > 0) {

            $fileExists = file_exists($fileDir);

            if ($fileExists) {
                $env = file_get_contents($fileDir);
                $env = preg_split('/\s+/', $env);


                foreach ($values as $xValues) {
                    $xValues = explode("=", $xValues, 2);

                    foreach ($env as $key => $xEnv) {
                        if ($xEnv !== "" && $xEnv !== "\n") {

                            $xEnv = explode("=", $xEnv, 2);
                            if ($xEnv[0] === $xValues[0]) {
                                $xEnv[1] = $xValues[1];
                            } else {
                                $xEnv[1] = $xEnv[1];
                            }
                            $xEnv = implode("=", $xEnv);
                            $env[$key] = $xEnv;
                        }
                    }
                }
                $env = implode("\n", $env);
                file_put_contents($fileDir, $env);
                return true;
            }
        }

        return false;
    }



    /**
     * @param string $key
     * @param string $fileDir
     *
     * @return array
     */
    public static function getOne($key, $fileDir)
    {
        if (!empty($key)) {
            $fileExists = file_exists($fileDir);


            if ($fileExists) {

                $env = file_get_contents($fileDir);
                $env = preg_split('/\s+/', $env);

                $value = array_filter($env,  function ($variable) use ($key) {
                    $xVariable = explode("=", $variable);
                    if (is_array($xVariable)) {
                        return $xVariable[0] === $key ?  true : false;
                    }
                });

                $variable = [];
                if (count($value) > 0) {
                    $value = explode("=", $value[0]);
                    $variable["key"] = $value[0];
                    $variable["value"] = $value[1];
                } else {
                    $variable["key"] = "This key not founded in {$fileDir}";
                    $variable["value"] = null;
                }

                return $variable;
            } else {
                return "The .env file could not be found in the specified path";
            }
        }
    }

    /**
     * @param string $fileDir
     *
     * @return array|string
     */
    public static function getAllKeys($fileDir)
    {
        if (!empty($fileDir)) {
            $fileExists = file_exists($fileDir);
            if ($fileExists) {

                $env = file_get_contents($fileDir);
                $env = preg_split('/\s+/', $env);
                return array_filter(array_map(function ($item) {
                    return explode("=", $item)[0];
                }, $env));
            } else {
                return "The .env file could not be found in the specified path";
            }
        } else {
            return "Cannot search for keys without .env file path";
        }
    }

   /**
     * @param string $fileDir
     *
     * @return array|string
     */
    public static function getAllValues($fileDir)
    {
        if (!empty($fileDir)) {
            $fileExists = file_exists($fileDir);
            if ($fileExists) {

                $env = file_get_contents($fileDir);
                $env = preg_split('/\s+/', $env);

                return array_filter(array_map(function ($item) {
                    $xItem = explode("=", $item);
                    if (count($xItem) === 2) return explode("=", $item)[1];
                    else return [];
                }, $env));
            } else {
                return "The .env file could not be found in the specified path";
            }
        } else {
            return "Cannot search for keys without .env file path";
        }
    }

    /**
     * @param string $fileDir
     *
     * @return array|string
     */
    public static function getAllKeysAndValues($fileDir)
    {
        if (!empty($fileDir)) {
            $fileExists = file_exists($fileDir);
            if ($fileExists) {

                $env = file_get_contents($fileDir);
                $env = array_filter(preg_split('/\s+/', $env));


                return array_filter(array_map(function ($item) {
                    $xItem = explode("=", $item);
                    if (count($xItem) === 2) {
                        return ["key" => $xItem[0], "value" => $xItem[1]];
                    }
                    else return [];
                }, $env));
            } else {
                return "The .env file could not be found in the specified path";
            }
        } else {
            return "Cannot search for keys without .env file path";
        }
    }
}
