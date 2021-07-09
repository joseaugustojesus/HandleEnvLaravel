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
                            // dd($xEnv);
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
}
