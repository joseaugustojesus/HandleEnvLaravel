<?php

namespace JoseAugusto\App;

class HandleEnv
{
    /**
     * @param array $values
     *
     * @return boolean
     */
    public static function changeEnv($values = [], $fileDir)
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
    public static function get($key, $fileDir)
    {
        if (!empty($key) && $key !== "") {
            $fileExists = file_exists($fileDir);
            $env = file_get_contents($fileDir);
            $env = preg_split('/\s+/', $env);


            $value = array_filter($env,  function ($variable) use($key){
                $xVariable = explode("=", $variable);
                if(is_array($xVariable)){
                    return $xVariable[0] === $key ?  true : false;
                }
            });

            $variable = [];
            if(count($value) > 0){
                $value = explode("=", $value[0]);
                $variable["key"] = $value[0];
                $variable["value"] = $value[1];
            }else{
                $variable["key"] = "This key not founded in {$fileDir}";
                $variable["value"] = null;
            }

            return $variable;
        }
    }
}
